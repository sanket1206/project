<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Appointment;

class AppointmentTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_a_login_user_take_appointment(): void
    {
        $user = User::factory()->create();

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticated();

        $response = $this->post('/appointment', [
            'id' => $user->id,
            'name' => 'name',
            'email' => 'email',
            'phone' => 'phone',
            'doctor' => 'doctor',
            'date' => 'date',
            'message' => 'message',
            'status' => 'in progress',
        ]);

      $response->assertStatus(302);
      
    }
    public function test_a_logged_in_user_view_appointment(): void
    {
        $user = User::factory()->create();

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticated();

        $response = $this->post('/appointment', [
            'id' => $user->id,
            'name' => 'name',
            'email' => 'email',
            'phone' => 'phone',
            'doctor' => 'doctor',
            'date' => 'date',
            'message' => 'message',
            'status' => 'in progress',
        ]);

      $response->assertStatus(302);
    

      $response = $this->get('/login');



    }
    public function test_user_can_cancle_the_appointment():void
    {
        $user = User::factory()->create();

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticated();

        $response = $this->post('/appointment', [
            'id' => $user->id,
            'name' => 'name',
            'email' => 'email',
            'phone' => 'phone',
            'doctor' => 'doctor',
            'date' => 'date',
            'message' => 'message',
            'status' => 'in progress',
        ]);

      $response->assertStatus(302);

      $response = $this->delete('/cancle_appoint/{id}');
      

      


    }
}
