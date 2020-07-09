<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionComment extends Model
{
    protected $table = 'question_comments';
    protected $fillable = ['question_id', 'user_id', 'comment'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
