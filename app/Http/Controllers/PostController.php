<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePost;
use App\Http\Requests\UpdatePost;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post =Post::withCount('comments')->get();        
        return view('post.Index',[
            'posts'=>$post
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("post.Create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePost $request)
    {   $data=$request->only(['title', 'content']);
        $data['slug']= Str::slug($data['title'],'_');
        $data['active'] = false;
        $post= Post::create($data);
        /*
        //simple way but pro
        $post=new Post();
        $post->title =  $request->input('title');
        $post->content = $request->input('content');
        $post->slug = Str::slug($post->title,'_');
        $post->active = false;
        $post->save();*/
        $request->session()->flash('status','post was created');        
        return redirect(route("post.index"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        return view('post.Show',[
            'post'=>Post::find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        /**/
        return view("post.Edit",['post'=>Post::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePost $request, $id)
    {
         /*
        $data=$request->only(['title', 'content']);
        $data['slug']= Str::slug($data['title'],'_');
        $data['active'] = false;
        $post= Post::update($data);
       */
        $post = Post::findOrFail($id);
        $post->title =  $request->input('title');
        $post->content = $request->input('content');
        $post->slug = Str::slug($post->title,'_');
        $post->active = false;
        $post->save();
        $request->session()->flash('status','post was updated');
        return redirect(route("post.index"));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //
        // $post = Post::findOrFail($id);
        // $post->delete(); 
        Post::destroy($id);
        $request->session()->flash('status','post was  DELETE');       
        return redirect(route("post.index"));
    }
}
