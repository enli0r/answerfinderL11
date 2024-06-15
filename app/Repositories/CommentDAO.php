<?php

namespace App\Repositories;

use App\Models\Post;
use App\Models\Vote;
use App\Models\Order;
use App\Models\Comment;
use App\Interfaces\PostInterface;
use App\Interfaces\CommentInterface;

class CommentDAO implements CommentInterface
{
    public function getAllComments(){
        return Comment::all();
    }
    public function createComment($user_id, $post_id, $body){
        Comment::create([
            'user_id' => $user_id,
            'post_id' => $post_id,
            'body' => $body
        ]);
    }
    
    public function deleteComment(Comment $comment){
        foreach(Vote::all() as $vote){
            if($vote->comment_id == $comment->id){
                $vote->delete();
            }
        }

        $comment->delete();
    }

    public function updateComment(Comment $comment, $body){
        $comment->update([
            'body' => $body
        ]);
    }
}

?>