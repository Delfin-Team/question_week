<?php

use Illuminate\Database\Seeder;
use App\User;
class ExtraUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class,30)->create();
    }
}
