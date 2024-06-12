<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class PostsIndex extends Component
{
    use WithPagination;

    public $sortDirection = 'desc';
    public $search;

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
            'posts' => Post::when(strlen($this->search) >= 2, function($query){
                return $query->where('title', 'like', '%'.$this->search.'%');
            })
            ->orderBy('created_at', $this->sortDirection)
            ->get()
        ]);
    }
}
