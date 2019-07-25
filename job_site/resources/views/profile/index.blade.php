@extends('admin.master')

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <h3 class="text-center text-success"> {{Session::get('message')}}</h3>
                    <div class="panel-body">
                        <form action="{{ route('profile.store') }}" method="POST" class="form-horizontal">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label class="control-label col-md-3">Profile Picture</label>
                                <div class="col-md-9">
                                    <input type="file" name="image" accept="image/*"/>

                                    @if ($errors->has('product_quantity'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('product_quantity') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div><div class="form-group">
                                <label class="control-label col-md-3">Resume</label>
                                <div class="col-md-9">
                                    <input type="file" name="resume" accept="application/pdf/docs"/>

                                    @if ($errors->has('product_quantity'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('product_quantity') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-md-3">Skills</label>
                                <div class="col-md-9">
                                    <textarea  name="skills" class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3">Applicant Name</label>
                                <div class="col-md-9">

                                    <select name="company_id" class="form-control">
                                        {{--@foreach($companies as $company)--}}
                                            {{--<option value="{{$company->id}}">{{$company->business_name}}</option>--}}
                                        {{--@endforeach--}}
                                        <option>1</option>
                                        <option>1</option>
                                        <option>1</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-9 col-md-offset-3">
                                    <input type="submit" name="btn" value="Save Profile Info" class="btn btn-success"/>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection