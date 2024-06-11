<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function post(){
        return $this->belongsTo(Post::class);
    }

    public function votes(){
        return $this->belongsToMany(User::class, 'votes');
    }

    // ? is added to enable $user to be null and not throw an error
    public function isVotedByUser(?User $user){
        
        //if user is null
        if(!$user){
            return false;
        }

        //Returns boolean if user_id and comment_id exist as primary key in table VOTES
        return Vote::where('user_id', $user->id)->where('comment_id', $this->id)->exists();
    }

    //creating Vote model
    public function vote(User $user){
        Vote::create([
            'user_id' => $user->id,
            'comment_id' => $this->id
        ]);
    }

    //Removing vote
    public function removeVote(User $user){
        Vote::where('user_id', $user->id)->where('comment_id', $this->id)->first()->delete();
    }
}
