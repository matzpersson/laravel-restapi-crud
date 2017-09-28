<?php

use Illuminate\Database\Seeder;
use App\LookupStatus;

class LookupStatusesTableSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        LookupStatus::truncate();

        LookupStatus::create([
            'name' => 'In Progress',
            'description' => 'In Progress',
            'tag' => 'progress'
        ]);
        LookupStatus::create([
            'name' => 'Completed',
            'description' => 'Job is complete',
            'tag' => 'done'
        ]);
        LookupStatus::create([
            'name' => 'Standby',
            'description' => 'Staanding by',
            'tag' => 'progress'
        ]);

    }
}