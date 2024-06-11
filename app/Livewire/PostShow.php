<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class PostShow extends Component
{
    public $post;

    protected $listeners = ['postWasEdited'];

    public function mount(Post $post){
        $this->post = $post;
    }

    // public function postWasEdited(){
    //     $this->post->refresh();
    // }

    public function render()
    {
        return view('livewire.post-show');
    }
}
