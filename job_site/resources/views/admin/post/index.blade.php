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
                            <form action="{{ route('post.store') }}" method="POST" class="form-horizontal">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label class="control-label col-md-3">Job Title</label>
                                    <div class="col-md-9">
                                        <input type="text" name="Job_title" class="form-control"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Job Description</label>
                                    <div class="col-md-9">
                                        <input type="text" name="Job_description" class="form-control"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">Salary</label>
                                    <div class="col-md-9">
                                        <input type="text" name="salary" class="form-control"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Location</label>
                                    <div class="col-md-9">
                                        <input type="text" name="location" class="form-control"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Country</label>
                                    <div class="col-md-9">
                                        <input type="text" name="country" class="form-control"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Company Name</label>
                                    <div class="col-md-9">

                                        <select name="user_id" class="form-control">
                                            @foreach($companies as $company)
                                                <option value="{{$company->id}}">{{$company->business_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-9 col-md-offset-3">
                                        <input type="submit" name="btn" value="Save Job Info" class="btn btn-success btn-block"/>
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