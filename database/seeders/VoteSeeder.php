<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Vote;
use App\Models\Comment;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $comments = Comment::all();

        foreach($users as $user){
            foreach($comments as $comment){
                Vote::create([
                    'user_id' => $user->id,
                    'comment_id' => $comment->id
                ]);
            }
        }
    }
}
