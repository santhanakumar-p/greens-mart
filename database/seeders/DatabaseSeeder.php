<?php

namespace Database\Seeders;

use App\Models\Organization;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(StateSeeder::class);

        $organization = Organization::create([
            'name' => 'Test Organization',
            'country_code' => 'IN',
            'currency_code' => 'INR',
            'financial_year_start_month' => '4',
            'state_id' => 1,
        ]);

        User::factory()->create([
            'organization_id' => $organization->id,
            'name' => 'Test User',
            'email' => 'test@example.com',
            'role' => 'admin',
        ]);
    }
}
