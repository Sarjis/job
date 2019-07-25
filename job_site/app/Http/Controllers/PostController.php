<?php

namespace App\Http\Controllers;

use App\Company;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {

        return view('admin.post.index', ['companies' => Company::all('business_name', 'id')]);
    }

    public function create()
    {
        return view('admin.post.create', ['posts' => Post::all()]);
    }


    public function store(Request $request)
    {
        //return $request->all();
        Post::create($request->all());
        return redirect('/post')->with(['message' => 'saved']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return $post;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
