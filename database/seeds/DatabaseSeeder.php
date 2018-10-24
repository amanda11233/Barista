<?php

use Illuminate\Database\Seeder;
use App\Admin;
use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('asdasd'),
        );
        
        Admin::create($data);
    
    }
}
