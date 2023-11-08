<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
           'name'=>'Admin',
           'email'=>'admin@admin.com',
           'title'=>'System Admin',
           'seel_code'=>'0',
           'password'=>\Illuminate\Support\Facades\Hash::make('123456'),
        ]);
    }
}
