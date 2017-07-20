<?php

namespace App\Http\Controllers\Api;
use App\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Answer;
use App\User;
class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function questionWeek()
    {
      $current_date = Carbon::now();
      $sundayOfLastWeek = Carbon::now()->previous(Carbon::SUNDAY)->format('Y-m-d H:i:s');

      if ($current_date->dayOfWeek == 1) {
          $mondayOfLastWeek = Carbon::now()->previous(Carbon::MONDAY)->format('Y-m-d H:i:s');

      }else{
        $mondayOfLastWeek = Carbon::now()->previous(Carbon::MONDAY)->previous(Carbon::MONDAY)->format('Y-m-d H:i:s');
      }
      $question = Question::where([
                                    ['created_at','>=',$mondayOfLastWeek],
                                    ['created_at','<=',$sundayOfLastWeek]
                                  ])
                            ->orderBy('votes','DESC')->first();
      //$owner = User::find($question->user_id);
      if ($question->state == "propuesta") {
        $question->state = "ganadora";
        $question->save();
      }
      $question->user;
      $question->answers;
      return response()->json(['question' => $question, 200]);
    }
    public function addVote($id){
        $question = Question::find($id);
        $question->votes +=1;
        $question->save();
        return response()->json(['response'=>'ok'],200);
    }
    public function index()
    {
        $questions = Question::where([
          ['state','=','propuesta']
        ])->get();
        return response()->json($questions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $question = new Question();
      $question->title = $request->input('title');
      $question->description = "question";
      $question->state = 'propuesta';
      $question->user_id = 1;
      $question->save();
      //first option
      $answer1 = new Answer();
      $answer1->description = $request->answer1;
      $answer1->question_id = $question->id;
      $answer1->save();
      //second option
      $answer2 = new Answer();
      $answer2->description = $request->answer2;
      $answer2->question_id = $question->id;
      $answer2->save();
      //third option
      $answer3 = new Answer();
      $answer3->description = $request->answer3;
      $answer3->question_id = $question->id;
      $answer3->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question = Question::find($id);
        $question->user;
        $question->answers;

        return response()->json($question);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
