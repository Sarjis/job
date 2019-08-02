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

        //return User::where('id', Auth::user()->id)->first();
        if (Auth::user()->id) {
            return view('profile.index', ['applicant' => User::where('id', Auth::user()->id)->first()]);

        }
        return view('admin.master');

    }

    public function create()
    {
        return view('profile.create', ['profiles' => Profile::with('user')->get()]);
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'image' => 'required',
            'resume' => 'required',
            'skills' => 'required',
        ]);

        //return $request->applicant_id;

        if (Profile::where('user_id', Auth::user()->id)->first()) {
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
            $profile->user_id = Auth::user()->id;
            $profile->save();
            return redirect('/profile')->with(['message' => 'saved']);
        }
    }


    public function show($id)
    {
        $verifyApplicant = Profile::where('user_id', Auth::user()->id)->first();
        if ($verifyApplicant->id) {
            return view('profile.show', ['profile' => Profile::where('user_id', $id)->first()]);
        } else {
            return redirect('/profile')->with(['message' => 'Please fill the form']);

        }

    }


    public function edit($id)
    {
        if (Auth::user()->id == $id) {
            $user_type_checker = User::where('type', 0)->get();
            if ($user_type_checker) {
                $is_profile_exist = Profile::where('user_id', Auth::user()->id)->first();
                if ($is_profile_exist) {
                    if ($is_profile_exist->id) {
                        $verifier = Profile::where('user_id', $id)->first();

                        if ($verifier) {
                            return view('profile.edit', ['profile' => Profile::with('user')
                                ->where('user_id', '=', Auth::user()->id)
                                ->first(), 'user' => User::where('type', 0)->where('id', Auth::user()->id)->first()]);
                        } else {
                            return redirect()->back()->with(['message' => 'Something wrong']);
                        }

                    } else {
                        return redirect('/profile')->with(['message' => 'Please fill the form']);
                    }
                } else {
                    return 'Un Authorized';
                }
            } else {
                return 'Nop';
            }
        } else {
            return redirect()->back()->with(['message' => 'You are not allowed to access others account']);
        }

//        $app->bind('path.public', function (){
//            return __DIR__;
//        });
//    'options'=>[\PDO::ATTR_EMULATE_PREPARES=>true],


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
            $profile->user_id = Auth::user()->id;
            $profile->resume = $pdfUrl;
            $profile->image = $imageUrl;
            $profile->update();
            return redirect('/profile')->with(['message' => 'Updated']);
        }
        return redirect('/profile')->with(['message' => "You didn't change anything"]);

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
