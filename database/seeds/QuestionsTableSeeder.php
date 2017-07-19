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
        $todayIs = Carbon::now()->previous(Carbon::MONDAY)->format('Y-m-d H:i:s');
        DB::table('questions')->insert([
            'title' => "¿Qué tal tu día?",
            'description' => "Pregunta de la semana",
            'state' => "propuesta",
            'user_id' => 1,
            'group_id' => 1,
            'created_at' => $todayIs,
        ]);
        $todayIs2 = Carbon::now()->previous(Carbon::MONDAY)->previous(Carbon::MONDAY)->format('Y-m-d H:i:s');
        DB::table('questions')->insert([
            'title' => "¿Qué tal tu día de ayer?",
            'description' => "Pregunta de la semana",
            'state' => "propuesta",
            'user_id' => 1,
            'group_id' => 1,
            'created_at' => $todayIs2,
        ]);

    }
}
