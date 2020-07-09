<?php

namespace App\Helpers;

class VoteHelper
{

    public function vote($arrId,$model)
    {
        
    }

    public function devote($arrId,$model)
    {
        # code...
    }

    public function voteIsExist($arrId,$model)
    {
        return $model::where($arrId);
        # code...
    }

    public function deleteVote($arrId,$model){
    }
}

