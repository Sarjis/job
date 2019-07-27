@extends('admin.master')

@section('body')

        <div class="content-wrapper">
            <h3 class="text-center text-success"> {{Session::get('message')}}</h3>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr class="bg-primary">
                        <th>SL No.</th>
                        <th>Skills</th>
                        <th>CV</th>
                        <th>Email</th>
                        <th>Image</th>
                        <th>Action</th>


                    </tr>
                    </thead>
                    <tbody>
                    @php($i=1)
                    @foreach($profiles as $profile)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$profile->skills}}</td>

                            <td>
                                <a href="{{asset($profile->resume)}}">Download CV</a>

                            </td>
                            <td>
                                @if($profile->user)
                                    {{$profile->user->email}}
                                @endif
                            </td>
                            <td>
                                <img src="{{asset($profile->image)}}" width="50" height="50">
                            </td>

                            <td>
                                <a href="{{route('post.show',['post'=>$profile->id])}}">Select</a>
                            </td>


                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

@endsection