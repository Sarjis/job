@extends('admin.master')

@section('body')
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">
                        <h3 class="text-center text-success"> {{Session::get('message')}}</h3>

                        <div class="panel-body">
                            <form action="{{ route('profile.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label class="control-label col-md-3">Profile Picture</label>
                                    <div class="col-md-9">
                                        <input type="file" name="image" accept="image/*"/>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Resume</label>
                                    <div class="col-md-9">
                                        <input type="file" name="resume" accept="application/pdf" />

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

                                        <select name="applicant_id" class="form-control">
                                            <option>Select your Name</option>
                                            @foreach($applicants as $applicant)
                                            <option value="{{$applicant->id}}">{{$applicant->first_name}} {{$applicant->last_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-9 col-md-offset-3">
                                        <input type="submit" name="btn" value="Save Profile Info"
                                               class="btn btn-success"/>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection