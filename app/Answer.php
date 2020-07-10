<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class Answer extends Model
{
    protected $fillable = [
        'question_id','user_id','content'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function answer_upvote()
    {
        return $this->hasMany(AnswerPoint::class)->where('vote',true);
    }

    public function answer_downvote()
    {
        return $this->hasMany(AnswerPoint::class)->where('vote',false);
    }

    public function answer_vote()
    {
        return $this->hasMany(AnswerPoint::class)->where('user_id',Auth::id());
    }
}
