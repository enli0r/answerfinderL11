<?php

namespace App\Livewire;

use App\Interfaces\VoteInterface;
use App\Models\Post;
use App\Models\Comment;
use Livewire\Component;
use App\Models\UserImage;

class PostComment extends Component
{
    public $comment;
    public $post;
    public $hasVoted;

    protected VoteInterface $voteDAO;

    public function boot(VoteInterface $voteDAO)
    {
        $this->voteDAO = $voteDAO;
    }

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
            $this->voteDAO->vote(auth()->user(), $this->comment->id);
            // $this->comment->vote(auth()->user());
            $this->hasVoted = true;
        }
        else
        {
            $this->voteDAO->removeVote(auth()->user(), $this->comment->id);
            // $this->comment->removeVote(auth()->user());
            $this->hasVoted = false;
        }
    }

    public function render()
    {
        $user_id = $this->comment->user->id;
        $img_name = UserImage::where('user_id', $user_id)->value('name');

        if($img_name == null){
            $img_name = 'no-user.jpg';
        }

        return view('livewire.post-comment',[
            'votescount' => $this->comment->votes()->count(),
            'img_name' => $img_name
        ]);
    }
}
