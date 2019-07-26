<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Image;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //return User::where('business_name', 'applicant')->get();
        return view('profile.index', ['applicants' =>  User::where('business_name', 'applicant')->get()]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    public function store(Request $request)
    {
//        request()->validate([
//
//            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//            'resume' => 'required|mimes:application/pdf"',
//
//        ]);

        //return $request->applicant_id;
        $imageName = time() . '.' . request()->image->getClientOriginalExtension();
        $resume = time() . '.' . request()->resume->getClientOriginalExtension();

        $imageUrl = request()->image->move(public_path('images'), $imageName);
        $pdfUrl = request()->resume->move(public_path('docs'), $resume);
        $profile =new Profile();
        $profile->image= $imageUrl;
        $profile->resume= $pdfUrl;
        $profile->skills= $request->skills;
        $profile->applicant_id= $request->applicant_id;
        $profile->save();
        return redirect('/profile')->with(['message'=>'saved']);

//
//        return $request->all();
//        Profile::create($request->all());
//        return redirect('/profile')->with(['message'=>'saved']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
