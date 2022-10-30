<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Gig>
 */
class GigFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "user_id" => rand(1, 5),
            "company_name" => $this->faker->company(),
            "job_title" => $this->faker->sentence(),
            "job_location" => $this->faker->sentence(),
            "company_email" =>  $this->faker->companyEmail(),
            "company_website" => $this->faker->url(),
            "job_description" => $this->faker->paragraph(5)
        ];
    }
}
