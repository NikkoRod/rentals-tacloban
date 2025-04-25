<?php

namespace Tests\Feature\Auth;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

class TenantRegistrationTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_tenant_registration_screen_can_be_rendered()
    {
        $response = $this->get('/register/tenant');
        $response->assertStatus(200);
    }

    public function test_new_tenants_can_register()
    {
        $userData = [
            'name' => 'Test Tenant',
            'email' => 'tenant@example.com',
            'contact_number' => '1234567890',
            'password' => 'password123',
            'password_confirmation' => 'password123',
            'role' => 'tenant'
        ];

        $response = $this->post('/register/tenant', $userData);

        // Assert the user was created in the database
        $this->assertDatabaseHas('users', [
            'email' => $userData['email'],
            'role' => 'tenant'
        ]);

        // Get the created user
        $user = User::where('email', $userData['email'])->first();
        
        // Assert user is created
        $this->assertNotNull($user);

        // Log in the user manually for the test
        Auth::login($user);

        // Assert the user is authenticated
        $this->assertTrue(Auth::check());

        // Assert proper redirect to login page
        $response->assertRedirect('/login');
    }


    public function test_tenant_cannot_register_with_existing_email()
    {
       
        User::factory()->create([
            'email' => 'tenant@example.com'
        ]);

       
        $response = $this->post('/register/tenant', [
            'name' => 'Test Tenant',
            'email' => 'tenant@example.com',
            'contact_number' => '1234567890',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);

        $response->assertSessionHasErrors(['email']);
    }

    public function test_tenant_cannot_register_with_invalid_data()
    {
        $response = $this->post('/register/tenant', [
            'name' => '', // Empty name
            'email' => 'not-an-email',
            'contact_number' => '', // Empty contact number
            'password' => 'short', // Too short password
            'password_confirmation' => 'different', // Mismatched confirmation
        ]);

        $response->assertSessionHasErrors(['name', 'email', 'contact_number', 'password']);
    }

    public function test_password_must_be_confirmed()
    {
        $response = $this->post('/register/tenant', [
            'name' => 'Test Tenant',
            'email' => 'tenant@example.com',
            'contact_number' => '1234567890',
            'password' => 'password123',
            'password_confirmation' => 'different123',
        ]);

        $response->assertSessionHasErrors('password');
    }

    public function test_contact_number_must_be_valid_format()
    {
        $response = $this->post('/register/tenant', [
            'name' => 'Test Tenant',
            'email' => 'tenant@example.com',
            'contact_number' => 'invalid-number',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);

        $response->assertSessionHasErrors('contact_number');
    }
}


















