<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
            'user_id'     => 2
        ];

        if($this->voteIsExist($arrId,QuestionPoint::class)){
            $this->deleteVote($arrId,QuestionPoint::class);
            return "data dihapus";
        }

        $this->vote($arrId,$vote_type,QuestionPoint::class);

        return "gka ada";
    }

    public function voteAnswer($answer_id,$type)
    {
        
    }
}
