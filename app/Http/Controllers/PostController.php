<?php

namespace App\Http\Controllers;

use App\Interfaces\PostInterface;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $postDao;

    public function __construct(PostInterface $postDao)
    {
        $this->postDao = $postDao;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('posts.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post){
        return view('posts.show', [
            'post' => $post,
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
