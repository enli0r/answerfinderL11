<?php

namespace App\Interfaces;

use App\Models\User;

interface VoteInterface
{
    public function isVotedByUser(?User $user, $comment_id);
    public function vote(User $user, $comment_id);
    public function removeVote(User $user, $comment_id);
}

?>