<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::updateOrCreate(
            [
                'id' => 1
            ],
            [
                'name' => 'Mugove Machaka',
                'email' => 'mugove@sovtech.co.za',
                'password' => Hash::make('developer'),
                'email_verified_at' => Carbon\Carbon::now()
            ]
        );

        User::updateOrCreate(
            [
                'id' => 2
            ],
            [
                'name' => 'Luke',
                'email' => 'luke@sovtech.co.za',
                'password' => Hash::make('sovtech'),
                'email_verified_at' => Carbon\Carbon::now()
            ]
        );
    }
}
