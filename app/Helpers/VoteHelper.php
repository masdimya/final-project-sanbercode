<?php

namespace App\Helpers;

trait VoteHelper
{

    public function vote($data,$vote_type,$model)
    {
        if($vote_type == 'upvote'){
            $data['vote'] = true;
        }

        if($vote_type == 'downvote'){
            $data['vote'] = false;
        }
        
        $model::create($data);
    }

    public function voteIsExist($arrId,$model)
    {
        $data = $model::where($arrId)->first();
        return isset($data) ? true : false ;
    }

    public function deleteVote($arrId,$model){
        $model::where($arrId)->delete();
    }

    

    
}

