<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\Categories;

class ApiController extends Controller
{

    public function getAllPosts() {
        $allPosts = Posts::all();

        return response()->json(['data' => $allPosts]);
    }

    public function getAllCategories() {
        $allCategories = Categories::all();

        return response()->json(['data' => $allCategories]);
    }

    public function deletePost($id) {

        $postToDelete = Posts::findOrFail($id);

        $postToDelete -> delete();

        return response()->json(['data' => Posts::all()]);
    }

    public function getSinglePost($id) {

        $singlePost = Posts::findOrFail($id);

        return response()->json(['data' => $singlePost]);
    }

    public function getPostCategory($id) {
        $singleCategory = Categories::findOrFail($id);

        return response()->json(['data' => $singleCategory]);
    }

    public function storeNewPost(Request $request) {

        $data = $request -> validate([
            'title' => 'required|unique:posts|max:255',
            'author' => 'required|max:255',
            'content' => 'required',
            'release_date' => 'required|date',
            'rating' => 'max:5|min:0'
        ]);

        $category = Categories::findOrFail($request -> category_id);

        $newPost = Posts::make($data);

        $newPost -> category() -> associate($category);

        $newPost -> save();

        return response('ok', 200);
    }

    public function updatePost(Request $request, $id) {
        $data = $request -> validate([
            'title' => 'required|max:255|unique:posts,title,' . $id,
            'author' => 'required|max:255',
            'content' => 'required',
            'release_date' => 'required|date',
            'rating' => 'max:5|min:0'
        ]);

        $updatedtPost = Posts::findOrFail($id);
        $updatedtPost -> update($data);

        return response('ok', 200);

    }
}
