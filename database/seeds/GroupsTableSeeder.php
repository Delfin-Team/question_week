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
      DB::table('groups')->insert([
          'name' => 'First group',
          'user_id' => 1,
      ]);
      DB::table('group_user')->insert([
          'user_id' => 1,
          'group_id' => 1,
      ]);

    }
}
