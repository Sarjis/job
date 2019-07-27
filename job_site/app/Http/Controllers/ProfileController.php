<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;

class ProfileController extends Controller
{

    public function index()
    {

        //return User::where('business_name', 'applicant')->get();
        if (Auth::user()->id) {
            return view('profile.index', ['applicants' => User::where('business_name', 'applicant')->get()]);

        }
        return view('admin.master');

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
        // return $request;
//        request()->validate([
//
//            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//            'resume' => 'required|mimes:application/pdf"',
//
//        ]);

        //return $request->applicant_id;
        if ($request->image && $request->resume){
            $imageName = time() . '.' . request()->image->getClientOriginalExtension();
            $imageUrl = request()->image->move(('images'), $imageName);


            $resume = time() . '.' . request()->resume->getClientOriginalExtension();
            $pdfUrl = request()->resume->move(('docs'), $resume);

            $profile = new Profile();
            $profile->image = $imageUrl;
            $profile->resume = $pdfUrl;

            $profile->skills = $request->skills;
            $profile->user_id = $request->user_id;
            $profile->save();
            return redirect('/profile')->with(['message' => 'saved']);
        }


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
        $verifier = Profile::where('user_id', $id)->select('id')->first();

        //return $verifier->id;
        $user_id = Auth::user()->id;

        if ($verifier->id == $user_id) {

            return view('profile.edit', ['profile' => Profile::with('user')->find($id), 'users' => User::all()]);
        }else{
            //return view('profile.index');
            return 'Hello';
        }


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
        $profile = Profile::find($id);

        if ($request->image && $request->resume){
            $imageName = time() . '.' . request()->image->getClientOriginalExtension();
            $resume = time() . '.' . request()->resume->getClientOriginalExtension();

            $imageUrl = request()->image->move(('images'), $imageName);
            $pdfUrl = request()->resume->move(('docs'), $resume);

            unlink($profile->image);
            unlink($profile->resume);

            $profile->skills = $request->skills;
            $profile->user_id = $request->user_id;
            $profile->resume = $pdfUrl;
            $profile->image = $imageUrl;
            $profile->update();
            return redirect('/profile')->with(['message'=>'Updated']);
        }
        return 'Hello';

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
