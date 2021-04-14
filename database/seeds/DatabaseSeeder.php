<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(App\User::class, 1)->create();
        factory(App\Client::class, 10)->create();
        factory(App\Reload::class, 10)->create();
        factory(App\Record::class, 1)->create();
        factory(App\Order::class, 10)->create();
    }
}
