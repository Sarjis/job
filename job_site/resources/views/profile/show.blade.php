@extends('admin.master')

@section('body')
    @can('isApplicant')
        <div class="content-wrapper">
            <h3 class="text-center text-success"> {{Session::get('message')}}</h3>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">

                    <tr>
                        <td>
                            <img src="{{asset($profile->image)}}" width="100" height="100">
                        </td>

                    </tr>
                    <tr>
                        <td>
                            @if($profile->user)
                                {{$profile->user->first_name}} {{$profile->user->last_name}}
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <td>
                            @if($profile->user)
                                {{$profile->user->email}}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>{{$profile->skills}}</td>
                    </tr>
                    <tr>
                        <td>
                            <a href="{{asset($profile->resume)}}">Download CV</a>
                        </td>
                    </tr>

                </table>
            </div>
        </div>
    @endcan
@endsection