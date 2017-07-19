<?php

use Illuminate\Database\Seeder;

class AnswersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('answers')->insert([
          'description' => 'Mal',
          'question_id' => 1
      ]);
      DB::table('answers')->insert([
          'description' => 'Regular',
          'question_id' => 1
      ]);
      DB::table('answers')->insert([
          'description' => 'Muy Bien',
          'question_id' => 1
      ]);
      DB::table('answers')->insert([
          'description' => 'Mal',
          'question_id' => 2
      ]);
      DB::table('answers')->insert([
          'description' => 'Regular',
          'question_id' => 2
      ]);
      DB::table('answers')->insert([
          'description' => 'Muy Bien',
          'question_id' => 2
      ]);
    }
}
