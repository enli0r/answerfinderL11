<?php

namespace App\Livewire;

use App\Models\Comment;
use Livewire\Component;
use App\Interfaces\CommentInterface;

class EditComment extends Component
{
    public $comment;
    public $body;

    protected CommentInterface $commentDAO;

    public function boot(CommentInterface $commentDAO)
    {
        $this->commentDAO = $commentDAO;
    }

    protected $rules = [
        'body' => 'required|max:255'
    ];

    public function mount(Comment $comment){
        $this->comment = $comment;
        $this->body = $comment->body;
    }

    public function editComment(){
        $this->validate();

        $this->commentDAO->updateComment($this->comment, $this->body);


        // $this->comment->update([
        //     'body' => $this->body
        // ]);

        $this->dispatch('commentedited', 'Comment was successfully updated!');
    }

    public function render()
    {
        return view('livewire.edit-comment');
    }
}
