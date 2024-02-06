<?php

namespace Database\Seeders;

use App\Models\Partner;
use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PartnerProjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = Project::all();
        $partners = Partner::all();

        foreach ($projects as $project) {
            // Get a random number of partners to associate with the project
            $numPartners = rand(1, 3);

            // Shuffle the partners to randomize the selection
            $selectedPartners = $partners->random($numPartners);

            // Associate the selected partners with the project
            $project->partners()->attach($selectedPartners);
        }
    }
}
