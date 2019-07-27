
@extends('admin.master')
{{--@extends('layouts.app')--}}

@section('body')
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">
                        <h3 class="text-center text-success"> {{Session::get('message')}}</h3>
                        <div class="panel-body">
                            <form action="" method="POST" class="form-horizontal">

                                <div class="form-group">
                                    <label class="control-label col-md-3">Job Title</label>
                                    <div class="col-md-9">
                                        <input type="text" value="{{$post->Job_title}}" name="job_title"
                                               class="form-control"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Job Description</label>
                                    <div class="col-md-9">
                                        <textarea class="form-control"> {{$post->Job_description}}</textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">Salary</label>
                                    <div class="col-md-9">
                                        <input type="text" value="{{$post->salary}}" name="salary"
                                               class="form-control"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Location</label>
                                    <div class="col-md-9">
                                        <input type="text" value="{{$post->location}}" name="location"
                                               class="form-control"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Country</label>
                                    <div class="col-md-9">
                                        <input type="text" value="{{$post->country}}" name="country"
                                               class="form-control"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Company Name</label>
                                    <div class="col-md-9">
                                        @if($post->user)
                                            <input type="text" name="country" value="{{$post->user->business_name}}"
                                                   class="form-control"/>
                                        @endif


                                    </div>
                                </div>
                                @can('isApplicant')

                                    <div class="form-group">
                                        <div class="col-md-9 col-md-offset-3">
                                            <a href="{{route('application.index')}}" name="btn" class="btn btn-success">Apply </a>
                                        </div>
                                    </div>
                                @endcan

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection