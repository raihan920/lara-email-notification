<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use App\Models\User;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    //way 1
    // public function run(): void
    // {
    //     $faker = Faker::create();
    //     DB::table('users')->insert([
    //         'name'=>$faker->name(),
    //         'email'=>$faker->email(),
    //         'email_verified_at'=>now(),
    //         'password'=>$faker->password(),
    //         // 'password'=>Hash::make('password'),
    //         'birth_date'=>$faker->date(),
    //         'remember_token'=>Str::random(10),
    //         'created_at'=>now(),
    //         'updated_at'=>now()
    //     ]);
    // }
    //way 2
    public function run(): void
    {
        $faker = Faker::create();
        for($i=1; $i<=50; $i++){
            $user = new User();
            $user->name=$faker->name();
            $user->email=$faker->email();
            $user->email_verified_at=now();
            $user->password=$faker->password();
            $user->birth_date=$faker->date();
            $user->remember_token=Str::random(10);
            $user->created_at=now();
            $user->updated_at=now();
            $user->save();
        }
    }
}
