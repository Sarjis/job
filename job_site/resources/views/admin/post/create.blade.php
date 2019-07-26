@extends('admin.master')

@section('body')
    <div class="content-wrapper">
        <h3 class="text-center text-success"> {{Session::get('message')}}</h3>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                <tr class="bg-primary">
                    <th>SL No.</th>
                    <th>Job Title</th>
                    <th>Action</th>

                </tr>
                </thead>
                <tbody>
                @php($i=1)
                @foreach($posts as $post)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$post->Job_title}}</td>
                        <td>{{$post->Job_Description}}</td>
                        <td>
                            <a href="{{route('post.show',['post'=>$post->id])}}">Details</a>
                        </td>

                        {{--<td><img src="{{asset($product->product_image)}}" alt="" width="150px" height="200px"> </td>--}}
                        {{--<td>{{$product->publication_status==1?'Published':'Un-Published'}}</td>--}}

                        {{--<td>--}}

                            {{--<a href="{{route('product/details',['id'=>$product->id])}}" class="btn btn-info btn-xs" title="Details">--}}
                                {{--<span class="glyphicon glyphicon-zoom-out"></span>--}}
                            {{--</a>--}}
                            {{--@if($product->publication_status==1)--}}
                                {{--<a href="{{route('product/publish',['id'=>$product->id])}}" class="btn btn-info btn-xs" title="Published">--}}
                                    {{--<span class="glyphicon glyphicon-arrow-up"></span>--}}
                                {{--</a>--}}
                            {{--@else--}}
                                {{--<a href="{{route('product/un-publish',['id'=>$product->id])}}" class="btn btn-warning btn-xs"  title="Un-Published">--}}
                                    {{--<span class="glyphicon glyphicon-arrow-down"></span>--}}
                                {{--</a>--}}
                            {{--@endif--}}
                            {{--<a href="{{route('product-edit',['id'=>$product->id])}}" class="btn btn-success btn-xs">--}}
                                {{--<span class="glyphicon glyphicon-edit"></span>--}}
                            {{--</a>--}}
                            {{--<a href="{{route('product/delete',['id'=>$product->id])}}" class="btn btn-danger btn-xs"--}}
                               {{--onclick="return confirm('Are you sure?')">--}}
                                {{--<span class="glyphicon glyphicon-trash"></span>--}}
                            {{--</a>--}}
                        {{--</td>--}}
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection