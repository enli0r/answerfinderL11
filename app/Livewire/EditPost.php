<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use App\Interfaces\PostInterface;

class EditPost extends Component
{
    public $post;
    public $title;
    public $description;

    protected PostInterface $postDAO;

    public function boot(PostInterface $postDAO)
    {
        $this->postDAO = $postDAO;
    }

    protected $rules = [
        'title' => 'required|max:255',
        'description' => 'required|max:255'
    ];

    public function edit(){
        $this->validate();

        $this->postDAO->updatePost($this->post, $this->title, $this->description);

        $this->dispatch('postedited', 'Post was successfully updated!');
    }

    public function mount(Post $post){
        $this->post = $post;
        $this->title = $post->title;
        $this->description = $post->description;
    }

    public function render()
    {
        return view('livewire.edit-post');
    }
}
