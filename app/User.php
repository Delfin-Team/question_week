<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that sshould be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function questions(){
        return $this->hasMany('App\Question');
    }

    public function questionsAnswered()
    {
      return $this->belongsToMany('App\Question','question_user');
    }
    public function hasVotes()
    {
      return $this->belongsToMany('App\Question','user_has_vote');
    }
}
