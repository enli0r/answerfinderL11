<?php

namespace App\Http\Controllers;

use App\Interfaces\UserImageInterface;
use App\Models\User;
use App\Models\UserImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserImageController extends Controller
{
    protected $userimgDAO;

    public function __construct(UserImageInterface $userimgDAO)
    {
        $this->userimgDAO = $userimgDAO;
    }

    public function store(Request $request){

        $request->validate([
            'img' => 'required|image|mimes:jpeg,jpg,png,gif',
          ]);

        $imageName = time().'.'.$request->img->getClientOriginalExtension();
        $request->img->storeAs('public/uploads/images', $imageName);

        $this->userimgDAO->createUserImage(Auth::user()->id, $imageName);

        // UserImage::create([
        //     'user_id' => Auth::user()->id,
        //     'name' => $imageName
        // ]);


        return redirect()->route('posts.index');
    }
}
