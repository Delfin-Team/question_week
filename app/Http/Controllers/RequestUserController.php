<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RequestUser;
use Auth;
use App\Group;
class RequestUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(RequestUser::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $current_user = Auth::user()->id;
        $requestExists = RequestUser::where([
          ['user_id','=', $current_user],
          ['group_id','=', $request->group_id]
          ])->first();
        if ($requestExists != null) {
          return response()->json(['created' => false],200);
        }
        RequestUser::create([
          'group_id' => $request->group_id,
          'user_id' => $current_user,
        ]);

        return response()->json(['created' => true],200);




    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $requestt = RequestUser::find($id);

        if ($requestt->accepted) {
          return response()->json(['request' => $requestt],200);
        }
        $requestt->accepted = true;
        $requestt->save();

        $group = Group::find($requestt->group_id);
        $group->users()->attach($requestt->user_id);

        return response()->json(['request' => $requestt],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $req = RequestUser::find($id);
        $req->delete();
        return response()->json(['deleted' => true], 200);
    }
}
