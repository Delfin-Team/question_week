<?php

use Illuminate\Database\Seeder;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //fake group 1
      DB::table('groups')->insert([
          'name' => 'First group',
          'user_id' => 1,
      ]);
      DB::table('group_user')->insert([
          'user_id' => 1,
          'group_id' => 1,
      ]);
      DB::table('group_user')->insert([
          'user_id' => 2,
          'group_id' => 1,
      ]);
      //fake group 2
      DB::table('groups')->insert([
          'name' => 'Perenganito\'s group',
          'user_id' => 3,
      ]);
      DB::table('group_user')->insert([
          'user_id' => 3,
          'group_id' => 2,
      ]);
      DB::table('group_user')->insert([
          'user_id' => 4,
          'group_id' => 2,
      ]);

    }
}
