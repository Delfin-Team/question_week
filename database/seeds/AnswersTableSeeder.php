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
      //answers for question1
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
      //answers for question2
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
      //answers for question3
      DB::table('answers')->insert([
          'description' => 'Mal',
          'question_id' => 3
      ]);
      DB::table('answers')->insert([
          'description' => 'Regular',
          'question_id' => 3
      ]);
      DB::table('answers')->insert([
          'description' => 'Muy Bien',
          'question_id' => 3
      ]);
      //answers for question4
      DB::table('answers')->insert([
          'description' => 'Mal',
          'question_id' => 4
      ]);
      DB::table('answers')->insert([
          'description' => 'Regular',
          'question_id' => 4
      ]);
      DB::table('answers')->insert([
          'description' => 'Muy Bien',
          'question_id' => 4
      ]);
      //answers for question5
      DB::table('answers')->insert([
          'description' => 'Mal',
          'question_id' => 5
      ]);
      DB::table('answers')->insert([
          'description' => 'Regular',
          'question_id' => 5
      ]);
      DB::table('answers')->insert([
          'description' => 'Muy Bien',
          'question_id' => 5
      ]);
    }
}
