<?php

use Illuminate\Database\Seeder;
use App\Job;

class JobsTableSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	Job::truncate();
        $faker = \Faker\Factory::create();

        // -- Generate 100 users
        for ($i = 0; $i < 100; $i++) {
            Job::create([
                'name' => $faker->words($nb = 3, $asText = true)  ,
                'description' => $faker->text($maxNbChars = 200) ,
                'status_id' => $faker->numberBetween($min = 1, $max = 3),
                'assignedto_id' => $faker->numberBetween($min = 1, $max = 20),
                'progress' => $faker->numberBetween($min = 1, $max = 100)
            ]);
        }
    }
}
