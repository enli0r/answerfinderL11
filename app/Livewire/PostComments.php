<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class PostComments extends Component
{
    public $post;

    protected $listeners = ['commentWasAdded', 'hasVoted', 'commentWasDeleted'];

    public function mount(Post $post){
        $this->post = $post;
    }

    public function commentWasAdded(){
        $this->post->refresh();
    }

    public function commentWasDeleted(){
        $this->post->refresh();
    }

    public function render()
    {
        return view('livewire.post-comments', [
            'comments' => $this->post->comments
        ]);
    }
}
