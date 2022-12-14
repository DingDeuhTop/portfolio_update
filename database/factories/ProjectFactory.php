<?php

namespace Database\Factories;

use App\Models\Owner;
use App\Models\Skill;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'skill_id' => Skill::factory(),
            'name' => $this->faker->word(),
            'image' => Skill::factory(),
            'project_url' => $this->faker->url()
        ];
    }
}
