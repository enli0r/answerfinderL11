<?php

namespace App\Livewire;

use App\Models\Post;
use App\Models\Comment;
use Livewire\Component;

class PostComment extends Component
{
    public $comment;
    public $post;
    public $hasVoted;

    protected $listeners = ['commentedited'];

    public function commentedited(){
        $this->comment->refresh();
    }

    public function mount(Comment $comment, Post $post){
        $this->comment = $comment;
        $this->post = $post;
        $this->hasVoted = $comment->isVotedByUser(auth()->user()); //function in comment model
    }

    public function vote(){

        //checks if user is logged in
        if(!auth()->user()){
            return redirect()->route('login');
        }

        if(!$this->hasVoted)
        {
            $this->comment->vote(auth()->user());
            $this->hasVoted = true;
        }
        else
        {
            $this->comment->removeVote(auth()->user());
            $this->hasVoted = false;
        }
    }

    public function render()
    {
        return view('livewire.post-comment',[
            'votescount' => $this->comment->votes()->count()
        ]);
    }
}
