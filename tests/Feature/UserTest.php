<?php

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserTest extends TestCase
{
    public function test_user_update_with_valid_data()
    {
        $user = User::find(1);
        
        $response = $this->post('/edituser', [
            'user_id' => $user->id,
            'nama' => 'Kelompok FAMA',
            'email' => 'kelfama@mail.com',
            'password' => '12345',
            'password_confirm' => '12345',
            'old_password' => '12345',
        ]);

        $response->assertRedirect()->assertSessionHas('success', 'User Berhasil diupdate!');

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'nama' => 'Kelompok FAMA',
            'email' => 'kelfama@mail.com',
        ]);
    }

    public function test_user_update_with_incorrect_password()
    {
        $user = User::find(1);

        $response = $this->post('/edituser', [
            'user_id' => $user->id,
            'nama' => 'Updated FAMA Name',
            'email' => 'updatedkelfam@mail.com',
            'password' => 'wrongPassword',
            'password_confirm' => 'wrongPassword',
            'old_password' => 'wrongPassword',
        ]);

        $response->assertRedirect()->assertSessionHas('error', 'Terjadi Kesalahan!');
    }
}

