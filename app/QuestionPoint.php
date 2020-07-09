<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionPoint extends Model
{
    protected $table = 'question_points';
    protected $fillable = [
        'question_id','user_id','vote'
    ];
}
