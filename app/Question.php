<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['title','content'];

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
}
