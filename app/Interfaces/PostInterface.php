<?php

namespace App\Interfaces;

use App\Models\Post;

interface PostInterface 
{
    public function getAllPosts($search, $hasComments, $sortDirection);
    public function createPost($title, $description, $user_id);
    public function findPost(Post $post);
    public function deletePost(Post $post);
    public function updatePost(Post $post, $title, $description);
    public function getPostComments(Post $post);
}

?>