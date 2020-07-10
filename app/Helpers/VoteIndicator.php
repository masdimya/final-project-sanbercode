<?php

function setVoteIndicator($userVote,$type)
{
    if(isset($userVote)){
        $vote = $userVote->vote;

        if($type == 'upvote'){
            return $vote ? '':'disabled';
        }
        
        if($type == 'downvote'){
            return $vote ? 'disabled':'';
        }
    }

    return '';
}