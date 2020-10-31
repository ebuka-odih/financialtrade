<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        $admin = User::where('email', '=', 'admin@financialtrademarkets.com')->first();
        if($admin === null){
            DB::table('users')->insert([
                'name' => 'FTM',
                'user_status' => true,
                'user_role' => 'admin',
                'email' => 'admin@financialtrademarkets.com',
                'email_verified_at' => \Carbon\Carbon::now(),
                'password' => Hash::make('eQYrA5#v6HGr'),

            ]);
        }
    }
}
