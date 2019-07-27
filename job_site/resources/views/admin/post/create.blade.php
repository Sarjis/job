@extends('admin.master')

@section('body')
    <div class="content-wrapper">
        <h3 class="text-center text-success"> {{Session::get('message')}}</h3>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                <tr class="bg-primary">
                    <th>SL No.</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Action</th>

                </tr>
                </thead>
                <tbody>
                @php($i=1)
                @foreach($posts as $post)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$post->Job_title}}</td>
                        <td>{{$post->Job_description}}</td>

                        <td>
                            <a href="{{route('post.show',['post'=>$post->id])}}">Details</a>
                        </td>


                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection