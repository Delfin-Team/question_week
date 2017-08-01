<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $table = 'answers';
    protected $fillable = [
        'description',
    ];
    public function question(){
        return $this->belongsTo('App\Question');
    }

}
