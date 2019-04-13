<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    public function index() {
        return Post::all();
    }

    public function show($id) {
        return Post::find($id);
    }

    public function create (Request $request) {
        $post = new Post;

        $post->author = $request->author;
        $post->category = $request->category;
        $post->title = $request->title;
        $post->content = $request->content;

        $post->save();

        return array("Status - 200" => true);
    }

    public function delete($id) {
        Post::destroy($id);

        return array("Status - 410" => true);
    }

    public function update(Request $request) {
        $post = Post::find($request->id);

        $post->author = $request->author;
        $post->title = $request->title;
        $post->category = $request->category;
        $post->content = $request->content;

        $post->save();

        return array("Status - 100" => true);
    }
}
