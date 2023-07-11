<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\YearSeeder;
use Database\Seeders\MonthSeeder;
use Database\Seeders\RolesSeeder;
use Database\Seeders\ServicesSeeder;
use Database\Seeders\DocStatusSeeder;
use Database\Seeders\PermissionsSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RolesSeeder::class,
            UsersSeeder::class,
            PermissionsSeeder::class,
            DocStatusSeeder::class,
            // ServicesSeeder::class
            //php artisan db:seed --class=\\AddressSeeder
        ]);
    }
}
