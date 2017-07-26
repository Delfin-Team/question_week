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
                //hace 2 semanas
        DB::table('questions')->insert([
            'title' => "question 1, group 1",
            'description' => "Pregunta de la semana",
            'state' => "propuesta",
            'user_id' => 1,
            'votes' => 13,
            'group_id' => 1,
            'created_at' => '2017-07-13 20:55:55',
        ]);
        DB::table('questions')->insert([
            'title' => "question 2, group 1",
            'description' => "Pregunta de la semana",
            'state' => "propuesta",
            'votes' => 17,
            'user_id' => 2,
            'group_id' => 1,
            'created_at' => '2017-07-13 08:44:22',
        ]);
        DB::table('questions')->insert([
            'title' => "question 3, group 1",
            'description' => "Pregunta de la semana",
            'state' => "propuesta",
            'votes' => 20,
            'user_id' => 2,
            'group_id' => 1,
            'created_at' => '2017-07-13 05:47:50',
        ]);
                //hace una semana
        DB::table('questions')->insert([
            'title' => "question 4, group 1",
            'description' => "Pregunta de la semana",
            'state' => "propuesta",
            'user_id' => 3,
            'votes' => 13,
            'group_id' => 1,
            'created_at' => '2017-07-20 20:55:55',
        ]);
        DB::table('questions')->insert([
            'title' => "question 5, group 1",
            'description' => "Pregunta de la semana",
            'state' => "propuesta",
            'votes' => 17,
            'user_id' => 2,
            'group_id' => 1,
            'created_at' => '2017-07-21 08:44:22',
        ]);
        DB::table('questions')->insert([
            'title' => "question 6, group 1",
            'description' => "Pregunta de la semana",
            'state' => "propuesta",
            'votes' => 20,
            'user_id' => 3,
            'group_id' => 1,
            'created_at' => '2017-07-20 05:47:50',
        ]);
                //esta semana
        DB::table('questions')->insert([
            'title' => "question 7, group 1",
            'description' => "Pregunta de la semana",
            'state' => "propuesta",
            'user_id' => 1,
            'votes' => 13,
            'group_id' => 1,
            'created_at' => '2017-07-24 20:55:55',
        ]);
        DB::table('questions')->insert([
            'title' => "question 8, group 1",
            'description' => "Pregunta de la semana",
            'state' => "propuesta",
            'votes' => 17,
            'user_id' => 2,
            'group_id' => 1,
            'created_at' => '2017-07-25 08:44:22',
        ]);
        DB::table('questions')->insert([
            'title' => "question 9, group 1",
            'description' => "Pregunta de la semana",
            'state' => "propuesta",
            'votes' => 20,
            'user_id' => 3,
            'group_id' => 1,
            'created_at' => '2017-07-24 05:47:50',
        ]);
        //questions for group2
                //hace 2 semanas
        DB::table('questions')->insert([
            'title' => "question 1, group 2",
            'description' => "Pregunta de la semana",
            'state' => "propuesta",
            'user_id' => 4,
            'votes' => 13,
            'group_id' => 2,
            'created_at' => '2017-07-13 20:55:55',
        ]);
        DB::table('questions')->insert([
            'title' => "question 2, group 2",
            'description' => "Pregunta de la semana",
            'state' => "propuesta",
            'votes' => 17,
            'user_id' => 5,
            'group_id' => 2,
            'created_at' => '2017-07-13 08:44:22',
        ]);
        DB::table('questions')->insert([
            'title' => "question 3, group 2",
            'description' => "Pregunta de la semana",
            'state' => "propuesta",
            'votes' => 20,
            'user_id' => 5,
            'group_id' => 2,
            'created_at' => '2017-07-13 05:47:50',
        ]);
                //hace una semana
        DB::table('questions')->insert([
            'title' => "question 4, group 2",
            'description' => "Pregunta de la semana",
            'state' => "propuesta",
            'user_id' => 6,
            'votes' => 13,
            'group_id' => 2,
            'created_at' => '2017-07-20 20:55:55',
        ]);
        DB::table('questions')->insert([
            'title' => "question 5, group 2",
            'description' => "Pregunta de la semana",
            'state' => "propuesta",
            'votes' => 17,
            'user_id' => 4,
            'group_id' => 2,
            'created_at' => '2017-07-21 08:44:22',
        ]);
        DB::table('questions')->insert([
            'title' => "question 6, group 2",
            'description' => "Pregunta de la semana",
            'state' => "propuesta",
            'votes' => 20,
            'user_id' => 5,
            'group_id' => 2,
            'created_at' => '2017-07-20 05:47:50',
        ]);
                //esta semana
        DB::table('questions')->insert([
            'title' => "question 7, group 2",
            'description' => "Pregunta de la semana",
            'state' => "propuesta",
            'user_id' => 6,
            'votes' => 13,
            'group_id' => 2,
            'created_at' => '2017-07-24 20:55:55',
        ]);
        DB::table('questions')->insert([
            'title' => "question 8, group 2",
            'description' => "Pregunta de la semana",
            'state' => "propuesta",
            'votes' => 17,
            'user_id' => 4,
            'group_id' => 2,
            'created_at' => '2017-07-25 08:44:22',
        ]);
        DB::table('questions')->insert([
            'title' => "question 9, group 2",
            'description' => "Pregunta de la semana",
            'state' => "propuesta",
            'votes' => 20,
            'user_id' => 6,
            'group_id' => 2,
            'created_at' => '2017-07-24 05:47:50',
        ]);
        //questions for group3
                //hace 2 semanas
        DB::table('questions')->insert([
            'title' => "question 1, group 3",
            'description' => "Pregunta de la semana",
            'state' => "propuesta",
            'user_id' => 9,
            'votes' => 13,
            'group_id' => 3,
            'created_at' => '2017-07-13 20:55:55',
        ]);
        DB::table('questions')->insert([
            'title' => "question 2, group 3",
            'description' => "Pregunta de la semana",
            'state' => "propuesta",
            'votes' => 17,
            'user_id' => 7,
            'group_id' => 3,
            'created_at' => '2017-07-13 08:44:22',
        ]);
        DB::table('questions')->insert([
            'title' => "question 3, group 3",
            'description' => "Pregunta de la semana",
            'state' => "propuesta",
            'votes' => 20,
            'user_id' => 7,
            'group_id' => 3,
            'created_at' => '2017-07-13 05:47:50',
        ]);
                //hace una semana
        DB::table('questions')->insert([
            'title' => "question 4, group 3",
            'description' => "Pregunta de la semana",
            'state' => "propuesta",
            'user_id' => 9,
            'votes' => 13,
            'group_id' => 3,
            'created_at' => '2017-07-20 20:55:55',
        ]);
        DB::table('questions')->insert([
            'title' => "question 5, group 3",
            'description' => "Pregunta de la semana",
            'state' => "propuesta",
            'votes' => 17,
            'user_id' => 8,
            'group_id' => 3,
            'created_at' => '2017-07-21 08:44:22',
        ]);
        DB::table('questions')->insert([
            'title' => "question 6, group 3",
            'description' => "Pregunta de la semana",
            'state' => "propuesta",
            'votes' => 20,
            'user_id' => 9,
            'group_id' => 3,
            'created_at' => '2017-07-20 05:47:50',
        ]);
                //esta semana
        DB::table('questions')->insert([
            'title' => "question 7, group 3",
            'description' => "Pregunta de la semana",
            'state' => "propuesta",
            'user_id' => 8,
            'votes' => 13,
            'group_id' => 3,
            'created_at' => '2017-07-24 20:55:55',
        ]);
        DB::table('questions')->insert([
            'title' => "question 8, group 3",
            'description' => "Pregunta de la semana",
            'state' => "propuesta",
            'votes' => 17,
            'user_id' => 9,
            'group_id' => 3,
            'created_at' => '2017-07-25 08:44:22',
        ]);
        DB::table('questions')->insert([
            'title' => "question 9, group 3",
            'description' => "Pregunta de la semana",
            'state' => "propuesta",
            'votes' => 20,
            'user_id' => 8,
            'group_id' => 3,
            'created_at' => '2017-07-24 05:47:50',
        ]);

    }
}
//Crea unas 3 preguntas en 3 semanas
//'Y-m-d H:i:s'