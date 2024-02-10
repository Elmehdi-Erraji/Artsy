<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Psy\Command\ListCommand\PropertyEnumerator;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        $project = Project::create([
            'title' => $faker->sentence,
            'description' => $faker->paragraph,
            'start_date' => $faker->date(),
            'deadline' => $faker->date(),
            'budget' => $faker->randomFloat(2, 1000, 10000),
            'status' => $faker->randomElement([0, 1, 2, 3]),

        ]);
    }
}
