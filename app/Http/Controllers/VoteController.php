<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\VoteHelper;

class VoteController extends Controller
{
    use VoteHelper;

    public function voteQuestion($question_id,$type)
    {
        
    }

    public function voteAnswer($answer_id,$type)
    {
        
    }
}
