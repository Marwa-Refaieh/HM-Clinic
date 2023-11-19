<?php

namespace App\Console\Commands;

use App\Jobs\SendNotificationJob;
use App\Models\appointment;
use App\Notifications\SendEmail;
use Carbon\Carbon;
use Illuminate\Console\Command;

class ReminderClinic extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reminder_clinic';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send email for reminder clinic patient';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $clinic_patients = appointment::where('date' , Carbon::now()->addDay()->format('Y-m-d'))
        ->get();

        $messages['body'] = "Hey, We Are HM Cente \n we remind you of your tratment appointment tomorrow. \n we wish you well";

        if($clinic_patients != null){
            foreach($clinic_patients as $patient){

                SendNotificationJob::dispatch($patient->user()->first() , $messages);
            }
        }

        return Command::SUCCESS;
    }
}
