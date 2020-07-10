<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Helpers\VoteHelper;

use App\AnswerPoint;
use App\QuestionPoint;


class VoteController extends Controller
{
    use VoteHelper;

    public function voteQuestion($question_id,$vote_type)
    {
        $arrId = [
            'question_id' => $question_id,
            'user_id'     => Auth::id()
        ];

        if($this->voteIsExist($arrId,QuestionPoint::class)){
            $this->deleteVote($arrId,QuestionPoint::class);

            return redirect()->route('question.show',['question'=>$question_id]);
        }

        $this->vote($arrId,$vote_type,QuestionPoint::class);

        return redirect()->route('question.show',['question'=>$question_id]);
    }

    public function voteAnswer($question_id,$answer_id,$vote_type)
    {
        
        $arrId = [
            'answer_id' => $answer_id,
            'user_id'     => Auth::id()
        ];

        if($this->voteIsExist($arrId,AnswerPoint::class)){
            $this->deleteVote($arrId,AnswerPoint::class);

            return redirect()->route('question.show',['question'=>$question_id]);
        }
        

        $this->vote($arrId,$vote_type,AnswerPoint::class);

        return redirect()->route('question.show',['question'=>$question_id]);
    }
}
