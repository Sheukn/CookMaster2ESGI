<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class UsersControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testGetUsers()
    {
        $users = User::factory()->count(3)->create();

        $response = $this->get('/api/users');

        $response->assertStatus(200)
            ->assertJsonCount(3, 'data')
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'firstname',
                        'name',
                        'email',
                        'password',
                        'address',
                        'postal_code',
                        'city',
                        'country',
                        'phone',
                    ]
                ]
            ]);
    }

    public function testCreateUser()
    {
        $data = [
            'firstname' => 'User',
            'name' => 'User',
            'email' => 'user@user@exemple.com',
            'address' => '23 rue Balzac',
            'postal_code' => '75012',
            'city' => 'Paris',
            'country' => 'France',
            'phone' => '0613026330',
            'password' => bcrypt('Azerty11'),
        ];

        $response = $this->post('/api/users', $data);

        $response->assertStatus(201)
            ->assertJson([
                'name' => 'User',
                'email' => 'user@user@exemple.com'
            ]);

        $this->assertDatabaseHas('users', [
            'name' => 'User',
            'email' => 'user@user@exemple.com'
        ]);
    }

    public function testGetUser()
    {
        $user = User::factory()->create();

        $response = $this->get('/api/users/' . $user->id);

        $response->assertStatus(200)
            ->assertJson([
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email
            ]);
    }

    public function testUpdateUser()
    {
        $user = User::factory()->create();

        $data = [
            'name' => 'Updated Name',
            'email' => 'updated@example.com',
            'password' => 'newpassword'
        ];

        $response = $this->put('/api/users/' . $user->id, $data);

        $response->assertStatus(200);

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'name' => 'Updated Name',
            'email' => 'updated@example.com'
        ]);
    }

    public function testDeleteUser()
    {
        $user = User::factory()->create();

        $response = $this->delete('/api/users/' . $user->id);

        $response->assertStatus(200);

        $this->assertDatabaseMissing('users', [
            'id' => $user->id
        ]);
    }
}
