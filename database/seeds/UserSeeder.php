<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email', '=', 'user@financialtrademarkets.com')->first();
        if($user === null){
            DB::table('users')->insert([
                'name' => 'FTM',
                'user_status' => false,
                'user_role' => 'client',
                'email' => 'user@financialtrademarkets.com',
                'created_at' => \Carbon\Carbon::now(),
                'email_verified_at' => \Carbon\Carbon::now(),
                'password' => Hash::make('i ma'),

            ]);
        }
    }
}
