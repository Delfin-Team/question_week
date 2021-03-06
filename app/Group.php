<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Group extends Model
{
    protected $table = 'groups';
    protected $fillable = [
      'name', 'user_id'
    ];
    protected $dates = [
      'created_at',
    ];
    public function requests()
    {
      return $this->hasMany('App\RequestUser');
    }
    public function users()
    {
      return $this->belongsToMany('App\User');
    }

    public function questions()
    {
      return $this->hasMany('App\Question');
    }
    public function creator()
    {
      return $this->belongsTo('App\User');
    }

}
