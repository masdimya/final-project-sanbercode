<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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

    public function tags(){
        return $this->belongsToMany('App\Tag', 'tag_question', 'question_id', 'tag_id');
    }

}
