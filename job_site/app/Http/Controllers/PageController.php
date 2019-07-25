<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class PageController extends Controller
{
    function index()
    {
        return view('admin.master');
    }

}
