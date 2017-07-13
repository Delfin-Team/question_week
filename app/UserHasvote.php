<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserHasvote extends Model
{
    protected $table = 'user_has_vote';

    protected $fillable = [
        'user_id', 'question_id',
    ];


}
