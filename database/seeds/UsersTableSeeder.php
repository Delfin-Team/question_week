<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
          'name' => "gilberto",
          'email' => "gilberto@gmail.com",
          'password' => bcrypt('gilberto'),
      ]);
      DB::table('users')->insert([
          'name' => "fulanito",
          'email' => "fulanito@gmail.com",
          'password' => bcrypt('fulanito'),
      ]);
      DB::table('users')->insert([
          'name' => "perenganito",
          'email' => "perenganito@gmail.com",
          'password' => bcrypt('perenganito'),
      ]);
      DB::table('users')->insert([
          'name' => "pedro",
          'email' => "pedro@gmail.com",
          'password' => bcrypt('pedro'),
      ]);
    }
}
