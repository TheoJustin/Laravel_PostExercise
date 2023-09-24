<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        User::create([
            'username' => 'LC104',
            'password' => bcrypt('password1'),
            'email' => 'tj@gmail.com',
            'phone_number' => '0831283012',
            'books_owned' => 20,
            'role' => 'admin',
            "created_at" => Carbon::now()->format('Y-m-d H:i:s'),
            "updated_at" => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        User::create([
            'username' => 'justin',
            'password' => bcrypt('password2'),
            'email' => 'justin@gmail.com',
            'phone_number' => '0831283012',
            'books_owned' => 0,
            'role' => 'member',
            "created_at" => Carbon::now()->format('Y-m-d H:i:s'),
            "updated_at" => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        User::create([
            'username' => 'budi',
            'password' => bcrypt('password3'),
            'email' => "budi@gmail.com",
            'phone_number' => '0831283012',
            'books_owned' => 0,
            'role' => 'guest',
            "created_at" => Carbon::now()->format('Y-m-d H:i:s'),
            "updated_at" => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
