<?php

namespace App\Livewire;

use App\Models\Post;
use App\Models\User;
use Livewire\Component;
use App\Models\UserImage;
use Illuminate\Support\Facades\Cookie;

class PostShow extends Component
{
    public $post;

    protected $listeners = ['postedited'];

    public function mount(Post $post){
        $this->post = $post;
    }

    public function postedited(){
        $this->post->refresh();
    }

    public function render()
    {
        $user_id = $this->post->user->id;
        $img_name = UserImage::where('user_id', $user_id)->value('name');

        if($img_name == null){
            $img_name = 'no-user.jpg';
        }

        $user_name = User::where('id', $this->post->user->id)->value('name');

        Cookie::queue('title', $this->post->title, 60);
        Cookie::queue('description', $this->post->description, 60);
        Cookie::queue('user_id', $this->post->user->id, 60);
        Cookie::queue('post_id', $this->post->id, 60);
        Cookie::queue('created_at', $this->post->created_at, 60);
        Cookie::queue('user_name', $user_name, 60);
        Cookie::queue('commentsCount', $this->post->comments()->count(), 60);
        Cookie::queue('img', $img_name, 60);

        return view('livewire.post-show', [
            'img_name' => $img_name
        ]);
    }
}
 