<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnswerPoint extends Model
{
    protected $table = 'answer_points';
    protected $fillable = [
        'answer_id','user_id','vote'
    ];
}
