<?php

namespace App\Http\Controllers;

use App\Company;
use App\Post;
use App\User;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function applicant_post()
    {
        //return Post::with('applicant')->get();
        return view('admin.post.applicant-post', ['posts' => Post::with('applicant')->get()]);
    }

    public function index()
    {
        return view('admin.post.index', ['companies' => User::where('type', '1')->get()]);
    }

    public function create()
    {
        return view('admin.post.create', ['posts' => Post::all()]);
    }


    public function store(Request $request)
    {
        Post::create($request->all());
        return redirect('/post')->with(['message' => 'saved']);
    }


    public function show($id)
    {
        return view('admin.post.show', ['post' => Post::find($id)]);
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
