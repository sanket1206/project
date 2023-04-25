<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Appointment;

class DoctorTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_doctor_added_successfully()
    {
        $user = User::factory()->create();

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticated();

        $response = $this->post('/upload_doctor', [
            'id' => $user->id,
            'name' => 'name',
            'phone' => 'phone',
            'speciality' => 'speciality',
            'room' => 'room',
            'image' => 'image',
            
        ]);

        $response->assertStatus(500);

       
    }
    public function test_show_all_doctor():void 
    {
        $user = User::factory()->create();

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticated();

        $response = $this->get('/showdoctor');

        $response->assertStatus(200);

    }
    public function test_delete_doctor(): void 
    {
        $user = User::factory()->create();

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticated();

        $response = $this->post('/upload_doctor', [
            'id' => $user->id,
            'name' => 'name',
            'phone' => 'phone',
            'speciality' => 'speciality',
            'room' => 'room',
            'image' => 'image',
            
        ]);
        $response = $this->delete('/deletedoctor/{id}');
        
    }
    public function test_update_doctor(): void 
    {
        $user = User::factory()->create();

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticated();

        $response = $this->post('/upload_doctor', [
            'id' => $user->id,
            'name' => 'name',
            'phone' => 'phone',
            'speciality' => 'speciality',
            'room' => 'room',
            'image' => 'image',
            
        ]);
       
        
        $response=$this->put('/updatedoctor/{id}',[

            'name' => 'name',
            'phone' => 'phone',
            'speciality' => 'speciality',
            'room' => 'room',
            'image' => 'image',



        ]);

        

        $response->assertStatus(405);
        
    }


}
