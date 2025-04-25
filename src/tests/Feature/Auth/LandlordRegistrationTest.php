<?php

namespace Tests\Feature\Auth;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

class LandlordRegistrationTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function setUp(): void
    {
        parent::setUp();
        Storage::fake('public');
    }

    public function test_landlord_registration_screen_can_be_rendered()
    {
        $response = $this->get('/register/landlord');
        $response->assertStatus(200);
    }

    public function test_new_landlords_can_register()
    {
        $permitFile = UploadedFile::fake()->create('permit.pdf', 100);
        
        $userData = [
            'name' => 'Test Landlord',
            'email' => 'landlord@example.com',
            'contact_number' => '09123456789',
            'password' => 'password123',
            'password_confirmation' => 'password123',
            'role' => 'landlord',
            'business_permit' => $permitFile
        ];

        $response = $this->post('/register/landlord', $userData);

        // Assert the user was created in the database
        $this->assertDatabaseHas('users', [
            'email' => $userData['email'],
            'role' => 'landlord'
        ]);

        // Get the created user
        $user = User::where('email', $userData['email'])->first();
        
        // Assert user is created
        $this->assertNotNull($user);

        // Assert business permit was stored
        $permitPath = 'business_permits/' . $permitFile->hashName();
        Storage::disk('public')->assertExists($permitPath);

        // Assert proper redirect
        $response->assertRedirect('/');
    }

    public function test_landlord_cannot_register_with_existing_email()
    {
        User::factory()->create([
            'email' => 'landlord@example.com',
            'role' => 'landlord'
        ]);

        $userData = [
            'name' => 'Test Landlord',
            'email' => 'landlord@example.com',
            'contact_number' => '09123456789',
            'password' => 'password123',
            'password_confirmation' => 'password123',
            'business_permit' => UploadedFile::fake()->create('permit.pdf', 100)
        ];

        $response = $this->post('/register/landlord', $userData);
        $response->assertSessionHasErrors('email');
    }

    public function test_landlord_cannot_register_without_business_permit()
    {
        $userData = [
            'name' => 'Test Landlord',
            'email' => 'landlord@example.com',
            'contact_number' => '09123456789',
            'password' => 'password123',
            'password_confirmation' => 'password123',
            'role' => 'landlord'
        ];

        $response = $this->post('/register/landlord', $userData);
        $response->assertSessionHasErrors('business_permit');
    }

    public function test_landlord_cannot_register_with_invalid_business_permit_format()
    {
        $userData = [
            'name' => 'Test Landlord',
            'email' => 'landlord@example.com',
            'contact_number' => '09123456789',
            'password' => 'password123',
            'password_confirmation' => 'password123',
            'role' => 'landlord',
            'business_permit' => UploadedFile::fake()->create('permit.jpg', 100)
        ];

        $response = $this->post('/register/landlord', $userData);
        $response->assertSessionHasErrors('business_permit');
    }

    public function test_landlord_cannot_register_with_invalid_contact_number()
    {
        $userData = [
            'name' => 'Test Landlord',
            'email' => 'landlord@example.com',
            'contact_number' => '123456', // Invalid format
            'password' => 'password123',
            'password_confirmation' => 'password123',
            'role' => 'landlord',
            'business_permit' => UploadedFile::fake()->create('permit.pdf', 100)
        ];

        $response = $this->post('/register/landlord', $userData);
        $response->assertSessionHasErrors('contact_number');
    }
}