<?php

namespace App\Livewire;

use App\Models\Post;
use App\Models\Comment;
use Livewire\Component;
use Illuminate\Http\Response;
use App\Interfaces\CommentInterface;

class AddComment extends Component
{
    public $post;
    public $body;

    protected CommentInterface $commentDAO;

    public function boot(CommentInterface $commentDAO)
    {
        $this->commentDAO = $commentDAO;
    }

    protected $rules = [
        'body' => 'required|min:4',
    ];

    public function addComment(){
        if(auth()->guest()){
            abort(Response::HTTP_FORBIDDEN);
        }else{
            $this->validate();

            $this->commentDAO->createComment(auth()->user()->id, $this->post->id, $this->body);
            // Comment::create([
            //     'user_id' => auth()->user()->id,
            //     'post_id' => $this->post->id,
            //     'body' => $this->body
            // ]);

        }

        //resets body input field after submiting
        $this->reset('body');

        $this->dispatch('commentadded', 'Comment was successfully added!'); 
    }


    public function mount(Post $post){
        $this->post = $post;
    }

    public function render()
    {
        return view('livewire.add-comment');
    }
}
