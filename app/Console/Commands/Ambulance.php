<?php

namespace App\Console\Commands;

use App\Models\ambulance_order;
use Carbon\Carbon;
use Illuminate\Console\Command;

class Ambulance extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'deleteAmbulance';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'delete ambulance order that do not accepted';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        ambulance_order::where('status' , 0)
        ->where('created_at' , '<=' , Carbon::now()->subMinute()->format('Y-m-d H:i:s'))
        ->delete();

        return Command::SUCCESS;
    }
}
