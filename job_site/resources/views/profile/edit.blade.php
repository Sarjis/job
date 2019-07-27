@extends('admin.master')

@section('body')
    @can('isApplicant')
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">
                        <h3 class="text-center text-success"> {{Session::get('message')}}</h3>

                        {{--@if($profile && \Illuminate\Support\Facades\Auth::user())--}}
                            <div class="panel-body">

                                <form accept-charset="UTF-8"
                                      action="{{ route('profile.update',['profile'=>$profile->id]) }}" method="post"
                                      class="form-horizontal" enctype="multipart/form-data">
                                    @method("PATCH")
                                    {{ csrf_field() }}
                                    {{--<input type="hidden" name="_method" value="PUT">--}}
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Profile Picture</label>
                                        <div class="col-md-9">
                                            <input type="file" name="image" accept="image/*"/>
                                            <img src="{{asset($profile->image)}}" width="150" height="200">


                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Resume</label>
                                        <div class="col-md-9">
                                            <input class="form-control" type="file" name="resume"
                                                   accept="application/pdf"/>
                                            @if(asset($profile->resume))
                                                <h6>You have already uploaded cv</h6>

                                            @else
                                                <h6>Please uploaded cv</h6>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="control-label col-md-3">Skills</label>
                                        <div class="col-md-9">
                                            <textarea name="skills" class="form-control"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3">Applicant Name</label>
                                        <div class="col-md-9">
                                            @if($profile->user)
                                                {{$profile->user->first_name}}
                                            @endif
                                            <select name="user_id" class="form-control form-control @error('user_id') is-invalid @enderror">

                                                <option>Select Correct Name</option>
                                                @foreach($users as $user)
                                                    <option value="{{$user->id}}">{{$user->first_name}} {{$user->last_name}} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-9 col-md-offset-3">
                                            <input type="submit" name="btn" value="Update Profile Info"
                                                   class="btn btn-success"/>
                                        </div>
                                    </div>
                                    @error('user_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror


                                </form>
                            </div>
                        {{--@else--}}
                            {{--<h1>You are not allowed to Edit</h1>--}}
                        {{--@endif--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endcan
@endsection