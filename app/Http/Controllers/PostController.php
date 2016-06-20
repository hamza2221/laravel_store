<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post=Post::orderBy('id', 'desc')->paginate(2);
        return view('posts.index')->withPosts($post);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,array(
                'title'=>'required|max:250',
                'slug'=>'required|unique:posts|max:255',
                'body'=>'required'
            ));
        $post=new Post;
        $post->title=$request->title;
        $post->body=$request->body;
        $post->slug=$request->slug;
        $post->save();
        Session::flash('success','The post was saved successfully');
        return redirect()->route('posts.show',$post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post=Post::find($id);
        echo 'called';
        return view('posts.show')->withPosts($post);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $post=Post::find($id);
        return view('posts.edit')->withPosts($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $this->validate($request,array(
                'title'=>'required|max:250',
                'slug'=>'required|unique:posts|max:255',
                'body'=>'required'
            ));
        $post=POST::find($id);
        $post->title=$request->input('title');
        $post->body=$request->input('body');
        $post->slug=$request->slug;
        $post->save();
        $request->session()->flash('info', 'Post is updated successfully on '.date('M j Y g:i A', strtotime($post->updated_at)));
        return redirect(url('posts/'.$id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::find($id)->delete();
        Session::flash('danger','The post was deleted successfully');
        

    }
}
