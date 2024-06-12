<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class PostComments extends Component
{
    public $post;

    protected $listeners = ['commentadded', 'hasVoted', 'commentdeleted'];

    public function mount(Post $post){
        $this->post = $post;
    }

    public function commentadded(){
        $this->post->refresh();
    }

    public function commentdeleted(){
        $this->post->refresh();
    }

    public function render()
    {
        return view('livewire.post-comments', [
            'comments' => $this->post->comments
        ]);
    }
}
