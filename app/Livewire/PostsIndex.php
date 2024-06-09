<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class PostsIndex extends Component
{
    public function render()
    {
        $posts = Post::all();

        return view('livewire.posts-index', [
            'posts' => $posts
        ]);
    }
}
