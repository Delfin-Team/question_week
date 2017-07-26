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
      DB::table('users')->insert([
          'name' => "valeria",
          'email' => "valeria@gmail.com",
          'password' => bcrypt('valeria'),
      ]);
      DB::table('users')->insert([
          'name' => "joana",
          'email' => "joana@gmail.com",
          'password' => bcrypt('joana'),
      ]);
      DB::table('users')->insert([
          'name' => "rafa",
          'email' => "rafa@gmail.com",
          'password' => bcrypt('rafa'),
      ]);
      DB::table('users')->insert([
          'name' => "mari",
          'email' => "mari@gmail.com",
          'password' => bcrypt('mari'),
      ]);
      DB::table('users')->insert([
          'name' => "selena",
          'email' => "selena@gmail.com",
          'password' => bcrypt('selena'),
      ]);
      DB::table('users')->insert([
          'name' => "janeth",
          'email' => "janeth@gmail.com",
          'password' => bcrypt('janeth'),
      ]);
      DB::table('users')->insert([
          'name' => "erika",
          'email' => "erika@gmail.com",
          'password' => bcrypt('erika'),
      ]);
      DB::table('users')->insert([
          'name' => "estaban",
          'email' => "estaban@gmail.com",
          'password' => bcrypt('esteban'),
      ]);
      DB::table('users')->insert([
          'name' => "tito",
          'email' => "tito@gmail.com",
          'password' => bcrypt('tito'),
      ]);
      DB::table('users')->insert([
          'name' => "carlos",
          'email' => "carlos@gmail.com",
          'password' => bcrypt('carlos'),
      ]);
      DB::table('users')->insert([
          'name' => "rick",
          'email' => "rick@gmail.com",
          'password' => bcrypt('rick'),
      ]);
    }
}
