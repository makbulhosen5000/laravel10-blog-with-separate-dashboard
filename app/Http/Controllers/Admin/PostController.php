<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $objPost = new Post();
        // $data['posts'] = $objPost->join('categories','categories.id','=', 'posts.category_id')
        // ->select('posts.*','categories.name as category_name')->get();
        $data['posts'] = Post::all();
        $data['categories'] = Category::all();
        return view('admin.pages.post',$data);
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
          $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'description' => 'required',
            'thumbnail' => 'required',
        ]);
        $data = [
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'category_id' => $request->category_id,
            'description' => $request->description,
            'status' => $request->status,
        ];
        if($request->hasFile('thumbnail')){
            $file = $request->file('thumbnail');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' .$extension;
            $file->move(public_path('images/post/'),$filename);
            $data['thumbnail'] = $filename;
        }
        Post::create($data);
        Alert::success("Post Created Successfully");
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'description' => 'required',
        ]);
        $data = [
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'category_id' => $request->category_id,
            'description' => $request->description,
            'status' => $request->status,
        ];
        if($request->hasFile('thumbnail')){
            if($request->old_thumbnail){
                
                File::delete(public_path('images/post/'.$request->old_thumbnail));
            }
            $file = $request->file('thumbnail');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' .$extension;
            $file->move(public_path('images/post/'),$filename);
            $data['thumbnail'] = $filename;
        }
        Post::where('id',$id)->update($data);
        Alert::success("Post Updated Successfully");
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $postDelete=Post::find($id);
        if(file_exists('public/images/post/'.$postDelete->thumbnail)AND ! empty($postDelete->thumbnail))
        {
         unlink('public/images/post/'.$postDelete->thumbnail);
        }
        $postDelete->delete();
        Alert::success("Post Delete Successfully");
        return redirect()->back();
    }
}
