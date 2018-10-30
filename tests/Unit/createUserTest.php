<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Student;
class  createUserTest extends TestCase
{
    use DatabaseMigrations;
    /**    
      @test
     
     */
public function createUserTest(){
$students = Student::create([
   'name' => 'admin',
   'email' => 'admin@gmail.com',
   'address' => 'kathmandu',
   'phone' => '9808344849',
   'dob' => '2018-1-1',
   'gender' => 'Male',
   'password' => 'admin123'

   ]);

$this->addToAssertionCount(1);

}    }
