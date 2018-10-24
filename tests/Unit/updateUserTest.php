<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Student;
class  updateUserTest extends TestCase
{

    use DatabaseMigrations;
    
    /**    
      @test
     
     */
public function updateUserTest(){
$data = array(
    
        'name' => 'admin',
        'email' => 'admin@gmail.com',
        'address' => 'kathmandu',
        'phone' => '9808344849',
        'dob' => '2018-1-1',
        'gender' => 'Male',
        'password' => 'admin123'
     
       
);

Student::where('id' , 1)->update($data);


$this->addToAssertionCount(1);

}


    }
