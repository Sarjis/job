@extends('admin.master')

@section('body')
    <div class="content-wrapper">
        <h3 class="text-center text-success"> {{Session::get('message')}}</h3>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                <tr class="bg-primary">
                    <th>SL</th>
                    <th>Name</th>
                    <th>Email</th>


                </tr>
                </thead>
                <tbody>
                @php($i=0)
                @foreach($posts as $post)
                    <tr>
                        <td>{{++$i}}</td>
                        <td>
                            @if($post->applicant)
                                {{$post->applicant->first_name}} {{$post->applicant->last_name}}
                            @endif
                        </td>
                        <td>  @if($post->applicant)
                                {{$post->applicant->email}}
                            @endif
                        </td>


                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection