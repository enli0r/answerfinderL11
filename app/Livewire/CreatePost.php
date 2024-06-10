<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use Illuminate\Http\Response;

class CreatePost extends Component
{   
    public $title;
    public $description;

    protected $rules = [
        'title' => 'required|min:3',
        'description' => 'required|min:50'
    ];


    public function submit(){
        if(auth()->check()){
            $this->validate();

            Post::create([
                'user_id' => auth()->user()->id,
                'title' => $this->title,
                'description' => $this->description
            ]);

        }else{
            abort(Response::HTTP_FORBIDDEN);
        }

        $this->reset('title');
        $this->reset('description');

        // $this->emit('postWasCreated', 'Post was successfully created!');

        // if(url()->previous() != 'http://localhost/answerfinder/public'){
        //     return redirect()->route('posts.index')->with('message', 'Post was successfully created!');
        // }
    }

    public function render()
    {
        return view('livewire.create-post');
    }
}
