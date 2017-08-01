<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class RequestUser extends Model
{
    protected $table = 'requests';

    protected $fillable = [
      'accepted','user_id', 'group_id'
    ];
    protected $dates = [
      'created_at'
    ];
}
