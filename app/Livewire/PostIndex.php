<?php

namespace App\Livewire;

use App\Models\Post;
use App\Models\Vote;
use Livewire\Component;
use App\Models\UserImage;
use Illuminate\Support\Facades\Cookie;
use Hamcrest\Arrays\SeriesMatchingOnce;

class PostIndex extends Component
{
    public $post;

    public function mount(Post $post){
        $this->post = $post;
    }

    public function deletePost(){

        foreach($this->post->comments as $comment){

            //deleting all of the votes for that comment
            foreach(Vote::all() as $vote){
                if($comment->id == $vote->comment_id){
                    $vote->delete();
                }
            }

            //deleting the comment
            $comment->delete();
        }

        //deleting the post
        $this->post->delete();
        

        $this->dispatch('postWasDeleted');
    }


    public function render()
    {
        //Img
        $user_id = $this->post->user->id;
        $img_name = UserImage::where('user_id', $user_id)->value('name');

        if($img_name == null){
            $img_name = 'no-user.jpg';
        }


        return view('livewire.post-index', [
            'img_name' => $img_name
        ]);
    }
}
