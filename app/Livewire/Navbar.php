<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\UserImage;
use Illuminate\Support\Facades\Auth;

class Navbar extends Component
{
    public function render()
    {   
        $img_name = '';

        if(Auth::user()){
            $user_id = Auth::user()->id;
            $img_name = UserImage::where('user_id', $user_id)->value('name');
    
            if($img_name == null){
                $img_name = 'no-user.jpg';
            }
        }

        return view('livewire.navbar', [
            'img_name' => $img_name
        ]);
    }
}
