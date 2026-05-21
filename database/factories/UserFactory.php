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
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'phone' => fake()->unique()->numerify('##########'),
            'lot' => (string) fake()->numberBetween(1, 999),
            'mail_address' => fake()->streetAddress(),
            'ecommunication' => fake()->boolean(),
            'bill_address' => fake()->streetAddress(),
            'emergency_name' => fake()->name(),
            'emergency_phone' => fake()->numerify('##########'),
            'role' => 'user',
            'approved' => true,
            'late' => false,
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
    }

    public function admin(): static
    {
        return $this->state(fn (array $attributes): array => [
            'role' => 'admin',
        ]);
    }

    public function superadmin(): static
    {
        return $this->state(fn (array $attributes): array => [
            'role' => 'superadmin',
        ]);
    }
}
