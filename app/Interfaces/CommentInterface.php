<?php

namespace App\Interfaces;

use App\Models\Comment;

interface CommentInterface
{
    public function getAllComments();
    public function createComment($user_id, $post_id, $body);
    public function deleteComment(Comment $comment);
    public function updateComment(Comment $comment, $body);
}
