<?php

namespace App\Repositories;

use App\Models\UserImage;
use App\Interfaces\UserImageInterface;

class UserImageDAO implements UserImageInterface
{
    public function createUserImage($user_id, $name){
        UserImage::create([
            'user_id' => $user_id,
            'name' => $name
        ]);
    }

}

?>