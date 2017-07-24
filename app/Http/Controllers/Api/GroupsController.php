<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Group;

use Carbon\Carbon;
use App\Question;
use App\User;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
class GroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function questionWeekOfGroup($id)
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
                                     ['created_at','<=',$sundayOfLastWeek],
                                     ['group_id', '=', $id]
                                   ])
                             ->orderBy('votes','DESC')->first();

       if ($question->state == "propuesta") {
         $question->state = "ganadora";
         $question->save();
       }
       $question->user;
       $question->answers;
       return $question;
     }
    public function questionsOfWeek($id)
    {



      $startOfWeek = Carbon::now()->startOfWeek()->format('Y-m-d H:i:s');
      $endOfWeek = Carbon::now()->endOfWeek()->format('Y-m-d H:i:s');
      $questions = Question::where([

                                    ['created_at','>=',$startOfWeek],
                                    ['created_at','<=',$endOfWeek],
                                    ['group_id', '=', $id]
                                  ])
                            ->orderBy('votes','DESC')->get();
      return $questions;
    }
    public function index()
    {
        $token = JWTAUth::getToken();
        $user = JWTAUth::toUser($token);
        $groups = $user->groups;
        return response()->json(['groups' => $groups] , 200);
    }

    public function store(Request $request)
    {
        $group = new Group();
        $group->name = $request->input('name');
        $group->user_id = 1;
        $group->save();
        return response()->json(['group' => $group], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $group = Group::find($id);
        $questions = $this->questionsOfWeek($id);
        $questionOfWeek = $this->questionWeekOfGroup($id);
        $owner = User::find($group->user_id);
        return response()->json(['group' => $group,'owner' => $owner,'questions' => $questions, 'quesstionweek' => $questionOfWeek]);
    }

    public function destroy($id)
    {
        $group = Group::find($id);
        $group->delete();
        return response()->json(['message' => 'ok'],200);
    }
}
