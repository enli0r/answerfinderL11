<?php

namespace App\Livewire;

use App\Interfaces\CommentInterface;
use App\Models\Vote;
use App\Models\Comment;
use Livewire\Component;

class CommentDeletePopup extends Component
{
    public $comment;

    protected CommentInterface $commentDAO;

    public function boot(CommentInterface $commentDAO)
    {
        $this->commentDAO = $commentDAO;
    }

    public function mount(Comment $comment){
        $this->comment = $comment;
    }

    public function deleteComment(){

        $this->commentDAO->deleteComment($this->comment);


        $this->dispatch('commentdeleted', 'Comment was successfully deleted!');
    }

    public function render()
    {
        return view('livewire.comment-delete-popup');
    }
}
