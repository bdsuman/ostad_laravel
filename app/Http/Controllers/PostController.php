<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['posts'] = Post::all();

        return view('post.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|min:2',
            'description' => 'required|string'
        ]);
 
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput(); 
        }

        $post = new Post;
        $post->title = $request->title;
        $post->description = $request->description;

        $post->save();

        return back()->withSuccess('Post Successfully Inserted !!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
            $data['post'] = Post::find($id);
            if(is_null($data['post']) || empty($data['post'])){
                return redirect()->back()->withErrors(['Product Not Found.'])->withInput(); 
             }

        return view('post.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data['post'] = Post::find($id);
            if(is_null($data['post']) || empty($data['post'])){
                return redirect()->back()->withErrors(['Product Not Found.'])->withInput(); 
             }

        $validator = Validator::make($request->all(), [
            'title' => 'required|string|min:2',
            'description' => 'required|string'
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput(); 
        }

        $post = $data['post'];
        $post->title = $request->title;
        $post->description = $request->description;

        $post->update();

        return back()->withSuccess('Post Successfully Updated !!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        if(is_null($post)){
            return redirect()->back()->withErrors(['Product Not Found.'])->withInput(); 
         }
        $post->delete();
        return back()->withSuccess('Post Successfully Deleted !!');
    }
}
