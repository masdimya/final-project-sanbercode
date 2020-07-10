<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class Question extends Model
{
    protected $fillable = ['title','content', 'user_id', 'total_vote'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function QuestionComment(){
        return $this->hasMany(QuestionComment::class);
    }

    public function answer(){
        return $this->hasMany(Answer::class);
    }

    public function question_upvote()
    {
        return $this->hasMany(QuestionPoint::class)->where('vote',true);
    }

    public function question_downvote()
    {
        return $this->hasMany(QuestionPoint::class)->where('vote',false);
    }

    public function question_vote()
    {
        return $this->hasMany(QuestionPoint::class)->where('user_id',Auth::id());
    }

    public function tags(){
        return $this->belongsToMany('App\Tag', 'tag_question', 'question_id', 'tag_id');
    }

}
