<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\ProjectUser;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $projects = Project::all();

        foreach ($users as $user) {
            foreach ($projects as $project) {
                $user->projects()->attach($project, [
                    'request_status' => rand(0, 3),
                    'approval_status' => rand(0, 3),
                ]);
            }
        }
    }
}
