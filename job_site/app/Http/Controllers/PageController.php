<?php

namespace App\Http\Controllers;

use App\Company;
use App\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    function index()
    {
        return view('admin.post.create', ['posts' => Post::all()]);
//        return view('admin.master');
    }

}
