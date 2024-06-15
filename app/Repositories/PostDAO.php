<?php

namespace App\Repositories;

use App\Interfaces\PostInterface;
use App\Models\Post;
use App\Models\Vote;
use App\Models\Order;

class PostDAO implements PostInterface
{
    public function getAllPosts($search, $hasComments, $sortDirection){
        return Post::when(strlen($search) >= 2, function($query) use ($search){
            return $query->where('title', 'like', '%'.$search.'%');
        })
        ->when($hasComments, function($query) {
            return $query->whereHas('comments', function($query) {
                $query->where('id', '>', 0);
            });
        })
        ->orderBy('created_at', $sortDirection)
        ->paginate(5);
    }
    
    public function createPost($title, $description, $user_id){
        Post::create([
            'user_id' => $user_id,
            'title' => $title,
            'description' => $description
        ]);
    }

    public function findPost($postId){
        return Post::findOrFail($postId);
    }

    public function deletePost(Post $post){
        foreach($post->comments as $comment){
            //deleting all of the votes for that comment
            foreach(Vote::all() as $vote){
                if($comment->id == $vote->comment_id){
                    $vote->delete();
                }
            }

            //deleting the comment
            $comment->delete();
        }

        //deleting the post
        $post->delete();
    }

    public function updatePost(Post $post, $title, $description){
        $post->update([
            'title' => $title,
            'description' => $description
        ]);
    }

    public function getPostComments(Post $post)
    {
        return $post->comments;
    }
}

?>