<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\Vote;
use App\Models\Order;
use App\Interfaces\VoteInterface;

class VoteDAO implements VoteInterface
{
    public function isVotedByUser(?User $user, $comment_id){
        //if user is null
        if(!$user){
            return false;
        }

        //Returns boolean if user_id and comment_id exist as primary key in table VOTES
        return Vote::where('user_id', $user->id)->where('comment_id', $comment_id)->exists();
    }
    public function vote(User $user, $comment_id){
        Vote::create([
            'user_id' => $user->id,
            'comment_id' => $comment_id
        ]);
    }
    
    public function removeVote(User $user, $comment_id){
        Vote::where('user_id', $user->id)->where('comment_id', $comment_id)->first()->delete();
    }
}

?>