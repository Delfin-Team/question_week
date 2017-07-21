<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //questioons for group1
        $todayIs = Carbon::now()->previous(Carbon::MONDAY)->format('Y-m-d H:i:s');
        DB::table('questions')->insert([
            'title' => "question 1, group 1",
            'description' => "Pregunta de la semana",
            'state' => "propuesta",
            'user_id' => 1,
            'votes' => 13,
            'group_id' => 1,
            'created_at' => $todayIs,
        ]);

        $todayIs2 = Carbon::now()->previous(Carbon::MONDAY)->previous(Carbon::MONDAY)->format('Y-m-d H:i:s');
        DB::table('questions')->insert([
            'title' => "question 2, group 1",
            'description' => "Pregunta de la semana",
            'state' => "propuesta",
            'votes' => 17,
            'user_id' => 2,
            'group_id' => 1,
            'created_at' => $todayIs2,
        ]);
        DB::table('questions')->insert([
            'title' => "question 3, group 1",
            'description' => "Pregunta de la semana",
            'state' => "propuesta",
            'votes' => 20,
            'user_id' => 2,
            'group_id' => 1,
            'created_at' => $todayIs2,
        ]);
        //questions for group2
        DB::table('questions')->insert([
            'title' => "question 1, group 2",
            'description' => "Pregunta de la semana",
            'state' => "propuesta",
            'votes' => 12,
            'user_id' => 3,
            'group_id' => 2,
            'created_at' => $todayIs2,
        ]);
        DB::table('questions')->insert([
            'title' => "question 2, group 2",
            'description' => "Pregunta de la semana",
            'state' => "propuesta",
            'votes' => 3,
            'user_id' => 4,
            'group_id' => 2,
            'created_at' => $todayIs2,
        ]);


    }
}
