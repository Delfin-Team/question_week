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
      DB::table('group_user')->insert([
          'user_id' => 3,
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
      DB::table('group_user')->insert([
          'user_id' => 6,
          'group_id' => 2,
      ]);
      //fake group 3
      DB::table('groups')->insert([
          'name' => 'love group',
          'user_id' => 9,
      ]);
      DB::table('group_user')->insert([
          'user_id' => 9,
          'group_id' => 3,
      ]);
      DB::table('group_user')->insert([
          'user_id' => 10,
          'group_id' => 3,
      ]);
      DB::table('group_user')->insert([
          'user_id' => 11,
          'group_id' => 3,
      ]);
      //fake group 4
      DB::table('groups')->insert([
          'name' => 'Rick group',
          'user_id' => 15,
      ]);
      DB::table('group_user')->insert([
          'user_id' => 12,
          'group_id' => 4,
      ]);
      DB::table('group_user')->insert([
          'user_id' => 13,
          'group_id' => 4,
      ]);
      DB::table('group_user')->insert([
          'user_id' => 15,
          'group_id' => 4,
      ]);

    }
}
//cinco grupos con 3 users