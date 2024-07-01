<?php

namespace App\Livewire;

use App\Models\Post;
use App\Models\Vote;
use Livewire\Component;
use App\Interfaces\PostInterface;

class PostDeletePopup extends Component
{
    public $post;
    
    protected PostInterface $postDAO;

    public function boot(PostInterface $postDAO)
    {
        $this->postDAO = $postDAO;
    }

    public function mount(Post $post){
        $this->post = $post;
    }

    public function deletePost(){
        $this->postDAO->deletePost($this->post);

        
        $this->dispatch('postdeleted', 'Post was successfully deleted!');

        return redirect()->route('posts.index')->with('message', 'Post was successfully deleted!');
    }
    

    public function render()
    {
        return view('livewire.post-delete-popup');
    }
}
