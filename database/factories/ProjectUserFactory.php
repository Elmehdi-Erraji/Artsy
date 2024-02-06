<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\User;
use App\Models\ProjectUser;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectUserFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'project_id' => Project::factory(),
            'request_status' => $this->faker->randomElement([0, 1, 2]),
            'approval_status' => $this->faker->randomElement([0, 1, 2]),
        ];
    }
}

