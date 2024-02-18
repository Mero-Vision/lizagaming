<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin1data = [
            'name' => 'Hancie Phago',
            'email' => 'hanciewanemphago@gmail.com',
            'gender' => 'Male',
            'password' => Hash::make('Password'),
            'address' => 'Kathmandu',
            'mobile_no' => '982591512',
            'email_verified_at' => Carbon::now(),
            'status' => 'admin',

        ];

        $user1 = User::firstOrCreate(['email' => $admin1data['email']], $admin1data);


        $admin2data = [
            'name' => 'Nirjal Prasai',
            'email' => 'nirjalprasai23@gmail.com ',
            'gender' => 'Male',
            'password' => Hash::make('Password'),
            'address' => 'BTM',
            'mobile_no' => '567654534',
            'email_verified_at' => Carbon::now(),
            'status' => 'admin',

        ];

        $user2 = User::firstOrCreate(['email' => $admin2data['email']], $admin2data);

        $admin3data = [
            'name' => 'Suraj Majhi',
            'email' => 'surajmajhi308@gmail.com',
            'gender' => 'Male',
            'password' => Hash::make('Password'),
            'address' => 'BTM',
            'mobile_no' => '5676545567',
            'email_verified_at' => Carbon::now(),
            'status' => 'admin',

        ];

        $user3 = User::firstOrCreate(['email' => $admin3data['email']], $admin3data);


        $admin4data = [
            'name' => 'Samer Din',
            'email' => 'sameerdin20@gmail.com',
            'gender' => 'Male',
            'password' => Hash::make('Password'),
            'address' => 'BTM',
            'mobile_no' => '56765467',
            'email_verified_at' => Carbon::now(),
            'status' => 'admin',

        ];

        $user4 = User::firstOrCreate(['email' => $admin4data['email']], $admin4data);
    }
}