<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserInfo;
use Faker\Generator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Generator $faker)
    {
        $demoUser = User::create([
            // 'first_name'        => 'Daves',
            // 'last_name'         => 'Tonga',
            // 'email'             => 'davestonga@bicol-u.edu.ph',
            // 'password'          => Hash::make('admin'),
            // 'email_verified_at' => now(),

            'first_name'        => 'test',
            'last_name'         => 'test',
            'email'             => 'test@test.com',
            'password'          => Hash::make('test'),
            'email_verified_at' => now(),
        ]);

        $this->addDummyInfo($faker, $demoUser);
        $demoUser->assignRole(['super-admin']);
    }

    private function addDummyInfo(Generator $faker, User $user)
    {
        // $dummyInfo = [
        //     'company'  => $faker->company,
        //     'phone'    => $faker->phoneNumber,
        //     'website'  => $faker->url,
        //     'language' => $faker->languageCode,
        //     'country'  => $faker->countryCode,
        // ];

        // $info = new UserInfo();
        // foreach ($dummyInfo as $key => $value) {
        //     $info->$key = $value;
        // }
        // $info->user()->associate($user);
        // $info->save();
    }
}
