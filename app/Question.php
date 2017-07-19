<?php

namespace App;
use Auth;
use App\QuestionsUsers;
use App\UserHasvote;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'questions';
    protected $dates = [
      'created_at',
    ];
    protected $fillable = [
        'title','description','state','user_id','group_id','votes', 'created_at'
    ];
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function answers(){
        return $this->hasMany('App\Answer');
    }
    public function users()
    {
      return $this->belongsToMany('App\User','question_user');
    }
    public function votesUser()
    {
      return $this->belongsToMany('App\User','user_has_vote');
    }
    public function getAlreadyVoteAttribute()
    {
      $current_user = Auth::user()->id;
      $already = UserHasvote::where(
        [
          ['user_id','=',$current_user],
          ['question_id','=',$this->id],
        ]
      )->count();
      if ($already > 0){
        return true;
      }else{
        return false;
      }
      return $already;
    }
    public function getAlreadyAnsweredAttribute()
    {
      $current_user = Auth::user()->id;
      $already = QuestionsUsers::where(
        [
          ['user_id','=',$current_user],
          ['question_id','=',$this->id],
        ]
      )->count();
      if ($already > 0){
        return true;
      }else{
        return false;
      }
      return $already;
    }
}
