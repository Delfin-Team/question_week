<?php

namespace App;
use Auth;
use App\QuestionsUsers;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'questions';
    protected $dates = [
      'created_at',
    ];
    protected $fillable = [
        'title','description','state','user_id','votes'
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
      return $this->belongsToMany('App\Usr','user_has_vote');
    }
    public function getAlreadyVoteAttribute()
    {
      $already = UserHasVote::where(
        [
          ['user_id','=',1],
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
      $already = QuestionsUsers::where(
        [
          ['user_id','=',1],
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
