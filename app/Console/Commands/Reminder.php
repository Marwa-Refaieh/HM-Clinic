<?php

namespace App\Console\Commands;

use App\Jobs\SendNotificationJob;
use App\Models\appointment;
use App\Notifications\SendEmail;
use Carbon\Carbon;
use Illuminate\Console\Command;

class Reminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reminder_half_hour';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send email for reminder remote patient';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $remote_patients = appointment::where('date', Carbon::now()->format('Y-m-d'))
    //    ->where('time' , Carbon::now()->addHour()->format('H:i:s'))
        //   ->where('remotely', '<>', 0)
        ->get();

        $messages['body'] = "Hey, We Are HM Cente \n we will remind you of your tratment after an hour. \n we wish you well";

        if($remote_patients != null){
            foreach($remote_patients as $patient){
                if (Carbon::now()->addHours(3)->format('Y-m-d H:i:s') >= Carbon::parse($patient->time)->addMinutes(30)->format('Y-m-d H:i:s')){
                    SendNotificationJob::dispatch($patient->user()->first() , $messages);
                }

            }
        }

        return Command::SUCCESS;
    }
}
