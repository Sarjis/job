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
    }


    public function show($id)
    {
        //return $id;
        $user_id = Auth::user()->id;
        //return $user_id;
        $verifyApplicant = Profile::where('user_id', $user_id)->first();
        //return $verifyApplicant;

        if ($verifyApplicant->id) {

            //return Profile::where('user_id',$id);
            return view('profile.show', ['profile' => Profile::where('user_id', $id)->first()]);
        } else {
//            return view('profile.index')->with(['message'=>'Please fill the form']);
            return redirect('/profile')->with(['message' => 'Please fill the form']);

        }

    }


    public function edit($id)
    {
        $user_id = Auth::user()->id;

        $verifyApplicant = Profile::where('user_id', $user_id)->first();
        //return $verifyApplicant->user_id;

        //return $verifyApplicant;
        if ($verifyApplicant->id) {
//            $verifier = Profile::where('user_id', $id)->select('id')->first();
            $verifier = Profile::where('user_id', $id)->first();
            $user_identity = Auth::user()->id;
            //return $user_identity.$verifier->user_id;

            if ($verifier->user_id == $user_identity) {

//                $p = Profile::with('user')
//                    ->where('user_id', '=', $user_identity)
//                    ->first();
//                return $p;


                return view('profile.edit', ['profile' => Profile::with('user')
                    ->where('user_id', '=', $user_identity)
                    ->first(), 'users' => User::where('type', 0)->get()]);
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
        //return 'Hello';
    }

    public function makeRegister($id, $profile_id)
    {
        $profile = Profile::find($profile_id);
        $profile->company_id = $id;
        $profile->update();

        return redirect()->back()->with(['message' => 'Applicant selected']);

    }
}
