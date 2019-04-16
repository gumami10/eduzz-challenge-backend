<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index() {
        return Category::all();
    }

    public function show($id) {
        return Category::find($id);
    }

    public function create (Request $request) {
        $Category = new Category;

        $this->validate($request, [
            'title' => 'required|max:20',
        ]);

        $Category->description = $request->description;
        $Category->title = $request->title;

        $Category->save();

        return response(array("SUCCESS" => true), 200);
    }

    public function delete($id) {
        Category::destroy($id);

        return response(array("SUCCESS" => true), 200);
    }

    public function update(Request $request) {
        $Category = Category::find($request->id);

        $this->validate($request, [
            'id' => 'required',
        ]);

        if($request->title) {
            $Category->title = $request->title;
        }

        if($request->description) {
            $Category->description = $request->description;
        }

        $Category->save();

        return response(array("SUCCESS" => true), 200);
    }
}
