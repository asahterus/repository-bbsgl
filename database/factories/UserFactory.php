<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->optional()->title(),
            'given_name' => fake()->firstName(),
            'family_name' => fake()->optional()->lastName(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'role' => fake()->randomElement(['admin', 'author', 'reviewer', 'user']),
            'address' => fake()->optional()->address(),
            'department' => fake()->optional()->company(),
            'country' => fake()->optional()->country(),
            'homepage_url' => fake()->optional()->url(),
            'organization' => fake()->optional()->company(),
            'hide_email' => fake()->randomElement([
                'Make email visible to all',
                'Hide email to all except repository administration',
                'UNSPECIFIED'
            ]),
            'remember_token' => Str::random(10),
        ];
    }


    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
