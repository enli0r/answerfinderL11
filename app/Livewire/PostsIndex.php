<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;
use App\Interfaces\PostInterface;

class PostsIndex extends Component
{
    use WithPagination;

    public $sortDirection = 'desc';
    public $search;
    public $hasComments;
    protected PostInterface $postDAO;

    public function boot(PostInterface $postDAO)
    {
        $this->postDAO = $postDAO;
    }

    protected $queryString = ['search'];

    protected $listeners = ['postWasCreated', 'postdeleted'];

    public function postWasCreated(){
        $this->resetPage();
    }

    public function postdeleted(){
        $this->resetPage();
    }

    public function sort($sortDirection){

        if($this->sortDirection != $sortDirection)
        {
            $this->sortDirection = $sortDirection;
        }
    }

    public function updatingSerach(){
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.posts-index', [
            'posts' => $this->postDAO->getAllPosts($this->search, $this->hasComments, $this->sortDirection)
            // 'posts' => Post::when(strlen($this->search) >= 2, function($query){
            //     return $query->where('title', 'like', '%'.$this->search.'%');
            // })
            // ->when($this->hasComments, function($query) {
            //     return $query->whereHas('comments', function($query) {
            //         $query->where('id', '>', 0);
            //     });
            // })
            // ->orderBy('created_at', $this->sortDirection)
            // ->paginate(5)
        ]);
    }
}
