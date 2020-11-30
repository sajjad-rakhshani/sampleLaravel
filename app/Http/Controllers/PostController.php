<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Faker\Provider\File;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return 'sajjad';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = new Post();
        $data->title = $request['title'];
        $data->content = $request['content'];
        if($files=$request->file('image')){
            $name=$files->getClientOriginalName();
            $files->move('images',$name);
            $data->image=$name;
        }
        $data->save();
        return redirect('');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $post = Post::find($id);
        $post->title = $request['title'];
        $post->content = $request['content'];
        if($files=$request->file('image')){
            $name=$files->getClientOriginalName();
            $files->move('images',$name);
            $last_file = $post->image;
            if (file_exists("images/$last_file")){
                unlink("images/$last_file");
            }
            $post->image=$name;
        }
        $post->save();
        return redirect('');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
