<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;

class ProfileController extends Controller
{
    public function __construct()
    {
        //$this->authorize('isApplicant');


    }

    public function index()
    {

        //return User::where('business_name', 'applicant')->get();
        if (Auth::user()->id) {
            return view('profile.index', ['applicants' => User::where('business_name', 'applicant')->get()]);

        }
        return view('admin.master');

    }

    public function create()
    {
        return view('profile.create', ['profiles' => Profile::with('user')->get()]);
        return;
    }


    public function store(Request $request)
    {
        // return $request;
        request()->validate([

            'image' => 'required',
            'resume' => 'required',
            'user_id' => 'required',
            'skills' => 'required',

        ]);

        //return $request->applicant_id;

        if (Profile::where('user_id', $request->user_id)->first()) {
            return 'You have made it';
        } else if ($request->image && $request->resume) {
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


    public function show($id)
    {
        $user_id = Auth::user()->id;
        $verifyApplicant = Profile::where('user_id', $user_id)->first();
        if ($verifyApplicant) {
            return view('profile.show', ['profile' => Profile::find($id)]);
        } else {
//            return view('profile.index')->with(['message'=>'Please fill the form']);
            return redirect('/profile')->with(['message' => 'Please fill the form']);

        }

    }


    public function edit($id)
    {
        $user_id = Auth::user()->id;
        $verifyApplicant = Profile::where('user_id', $user_id)->first();
        if ($verifyApplicant) {
            $verifier = Profile::where('user_id', $id)->select('id')->first();
            $user_identity = Auth::user()->id;

            if ($verifier->id == $user_identity) {

                return view('profile.edit', ['profile' => Profile::with('user')
                    ->find($id), 'users' => User::where('type', 0)->get()]);
            } else {
                //return view('profile.index');
                return 'Hello';
            }
        } else {
//            return view('profile.index')->with(['message'=>'Please fill the form']);
            return redirect('/profile')->with(['message' => 'Please fill the form']);

        }



    }

    public function update(Request $request, $id)
    {
        $profile = Profile::find($id);

        if ($request->image && $request->resume) {
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
            return redirect('/profile')->with(['message' => 'Updated']);
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
