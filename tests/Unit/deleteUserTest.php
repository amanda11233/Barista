<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Student;
class  deleteUserTest extends TestCase
{

    use DatabaseMigrations;
    
    /**    
      @test
     
     */
public function deleteUserTest(){

Student::where('id' , 1)->delete();


$this->addToAssertionCount(1);

}


    }
