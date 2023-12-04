<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $objPost = new Post();
        $posts = $objPost->join('categories','categories.id','=', 'posts.category_id')
        ->select('posts.*','categories.name as category_name')
        ->where('posts.status',1)
        ->orderBy('posts.id','desc')
        ->get();
        $categories = Category::all();
        return view('user.index',compact('posts','categories'));
    }
     public function singlePostView(){
        $objPost = new Post();
        $post = $objPost->join('categories','categories.id','=', 'posts.category_id')
        ->select('posts.*','categories.name as category_name')
        ->where('posts.status',1)
        ->first();
         $categories = Category::all();
        return view('user.single-post-view',compact('post','categories'));
    }

    public function filterByCategory($id){
        $objPost = new Post();
        $posts = $objPost->join('categories','categories.id','=', 'posts.category_id')
        ->select('posts.*','categories.name as category_name')
        ->where('posts.status',1)
        ->orderBy('posts.id','desc')
        ->get();
        $categories = Category::all();
         return view('user.filter-by-category',compact('posts','categories'));
    }
}
