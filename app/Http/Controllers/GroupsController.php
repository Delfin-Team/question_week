<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Group;
use App\Question;
use Carbon\Carbon;
use App\User;
use App\Answer;
use Illuminate\Support\Facades\DB;
class GroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('group.index');
    }
    public function getGroups()
    {
      $current_user = Auth::user();
      $current_user->groups;
      $current_user->groupsCreated;
      $userGroups = $current_user->groups;
      $possibleGroups = Group::where([
        ['private','=',false],
        ['user_id','!=',$current_user->id],
        ])->get();
      return response()->json(['user' => $current_user,'possibleGroups' => $possibleGroups],200);

    }
    public function addUser($idUser, $idGroup)
    {

      $group = Group::find($idGroup);
      $belongsToGroup = DB::table('group_user')->where([
                                                  ['user_id','=', $idUser],
                                                  ['group_id','=', $idGroup],
                                                ])->first();
      if ($belongsToGroup != null) {
        return response()->json(['response' => false],200);
      }

      $group->users()->attach($idUser);
      return response()->json(['response' => true],200);
    }
    public function deleteUser($idUser, $idGroup)
    {

      $group = Group::find($idGroup);
      $group->users()->detach($idUser);
      return response()->json(['response' => true],200);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('group.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $group = new Group();
        $group->name = $request->name;
        if ($request->private) {
            $group->private = $request->private;
        }
        $group->user_id = Auth::user()->id;
        $group->save();
        $group->users()->attach(Auth::user()->id);
        $question = Question::create([
          'title' => '¿Qué te parece este grupo?',
          'description' => 'pregunta',
          'created_at' => Carbon::now()->previous(Carbon::SUNDAY)->format('Y-m-d H:i:s'),
          'user_id' => Auth::user()->id,
          'group_id' => $group->id,
          'state' => 'propuesta',
        ]);

        $question->answers()->create([
          'description' => 'Normal',
          'votes' => 0
        ]);
        $question->answers()->create([
          'description' => 'Bueno',
          'votes' => 0
        ]);
        $question->answers()->create([
          'description' => 'Muy bueno',
          'votes' => 0
        ]);

        return response()->json(['group' => $group],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detailGroup($id)
    {
      $group = Group::find($id);
      
      $requests = $group->requests->where('accepted',false);
      foreach ($requests as $request) {
        $request->user;
      }

      $owner = User::find($group->user_id);
      $current_date = Carbon::now();
      //get last day of week
      $sundayOfLastWeek = Carbon::now()->previous(Carbon::SUNDAY)->format('Y-m-d H:i:s');
      //get the first day of the last week, in this case always will be monday
      if ($current_date->dayOfWeek == 1) {
          $mondayOfLastWeek = Carbon::now()->previous(Carbon::MONDAY)->format('Y-m-d H:i:s');

      }else{
        $mondayOfLastWeek = Carbon::now()->previous(Carbon::MONDAY)->previous(Carbon::MONDAY)->format('Y-m-d H:i:s');
      }

      $startOfWeek = Carbon::now()->startOfWeek()->format('Y-m-d H:i:s');
      $endOfWeek = Carbon::now()->endOfWeek()->format('Y-m-d H:i:s');
      //get the question of week
      $theWinner = Question::where([

                                    ['created_at','>=',$mondayOfLastWeek],
                                    ['created_at','<=',$sundayOfLastWeek],
                                    ['group_id','=',$id]
                                  ])
                            ->orderBy('votes','DESC')->first();
      if ($theWinner != null) {
        $theWinner->user;
        $theWinner->answers;
        if ($theWinner->state == "propuesta") {
          $theWinner->state = "ganadora";
          $theWinner->save();
        }
        //the user already answered the the  question of week?
        $theWinner->alreadyAnswered = $theWinner->AlreadyAnswered;
      }
      //get the questions of the current week
      $questions = Question::where([

                                    ['created_at','>=',$startOfWeek],
                                    ['created_at','<=',$endOfWeek],
                                    ['group_id', '=', $id]
                                  ])
                            ->orderBy('votes','DESC')->get();
      //retrieve votes of each question
      foreach ($questions as $question) {
        $question->alreadyVote = $question->AlreadyVote;
        $question->user;
      }
      return response()->json(['group' => $group, 'questions' => $questions, 'questionWeek' => $theWinner, 'owner' => $owner,'requests' => $requests],200);
    }
    public function show($id)
    {
        $group = Group::find($id);
        $owner = User::find($group->user_id);
        return view('group.show',['group' => $group,'owner' => $owner]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $group = Group::find($id);
        return view('question.update',['group' => $group]);
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
        $group = Group::find($id);
        $group->name = $request->name;
        $group->save();
        return redirect()->route('groups.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $group = Group::find($id);
        $group->delete();
        return response()->json(['response' => 'ok'],200);
    }
}
