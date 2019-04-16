<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{

    public function index() {
        return Author::with(['categories'])->get();
    }

    public function show($id) {
        return Author::find($id)->category;
    }

    public function create (Request $request) {
        $author = new Author;

        $author->name = $request->name;
        $author->fav_category_id = $request->fav_category_id;

        $author->save();
        return response(array("SUCCESS" => true), 200);
    }

    public function delete($id) {

        Author::destroy($id);

        return response(array("SUCCESS" => true), 200);
    }

    public function update(Request $request) {
        $author = Author::find($request->id);

        if($request->name) {
            $author->name = $request->name;
        }

        if($request->fav_category) {
            $author->fav_category_id = $request->fav_category_id;
        }

        $author->save();

        return response(array("SUCCESS" => true), 200);
    }
}
