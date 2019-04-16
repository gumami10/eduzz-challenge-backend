<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    public function index() {
        return Post::with(['author', 'categories'])->get();
    }

    public function show($id) {
        return Post::find($id);
    }

    public function create (Request $request) {
        $post = new Post;

        $this->validate($request, [
            'author' => 'required|max:20',
        ]);

        $post->author = $request->author;
        $post->category = $request->category;
        $post->title = $request->title;
        $post->content = $request->content;

        $post->save();

        return response(array("SUCCESS" => true), 200);
    }

    public function delete($id) {
        Post::destroy($id);

        return response(array("SUCCESS" => true), 200);
    }

    public function update(Request $request) {
        $post = Post::find($request->id);

        $this->validate($request, [
            'id' => 'required',
        ]);

        if($request->author_id) {
            $post->author_id = $request->author_id;
        }

        if($request->title) {
            $post->title = $request->title;
        }

        if($request->category) {
            $post->category = $request->category;
        }

        if($request->content) {
            $post->content = $request->content;
        }

        $post->save();

        return response(array("SUCCESS" => true), 200);
    }
}
