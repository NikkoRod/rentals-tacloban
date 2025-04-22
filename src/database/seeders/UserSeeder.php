<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Tenants
        User::create([
            'name' => 'Tenant One',
            'email' => 'tenant1@example.com',
            'password' => Hash::make('password'),
            'contact_number' => '09171234501',
            'role' => 'tenant',
            'is_approved' => true,
            'email_verified_at' => Carbon::now(),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'Tenant Two',
            'email' => 'tenant2@example.com',
            'password' => Hash::make('password'),
            'contact_number' => '09171234502',
            'role' => 'tenant',
            'is_approved' => true,
            'email_verified_at' => Carbon::now(),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'Tenant Three',
            'email' => 'tenant3@example.com',
            'password' => Hash::make('password'),
            'contact_number' => '09171234503',
            'role' => 'tenant',
            'is_approved' => true,
            'email_verified_at' => Carbon::now(),
            'remember_token' => Str::random(10),
        ]);

        // Landlords
        User::create([
            'name' => 'Landlord One',
            'email' => 'landlord1@example.com',
            'password' => Hash::make('password'),
            'contact_number' => '09179876501',
            'role' => 'landlord',
            'is_approved' => true,
            'email_verified_at' => Carbon::now(),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'Landlord Two',
            'email' => 'landlord2@example.com',
            'password' => Hash::make('password'),
            'contact_number' => '09179876502',
            'role' => 'landlord',
            'is_approved' => true,
            'email_verified_at' => Carbon::now(),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'Landlord Three',
            'email' => 'landlord3@example.com',
            'password' => Hash::make('password'),
            'contact_number' => '09179876503',
            'role' => 'landlord',
            'is_approved' => true,
            'email_verified_at' => Carbon::now(),
            'remember_token' => Str::random(10),
        ]);
    }
}
