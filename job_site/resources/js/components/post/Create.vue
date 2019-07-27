<template>
    <div class="content-wrapper">
        <h3 class="text-center text-success"> <!--{{Session::get('message')}}--></h3>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                <tr class="bg-primary">
                    <th>SL No.</th>
                    <th>Job Title</th>
                    <th>Action</th>

                </tr>
                </thead>
                <!--<tbody>-->
                <!--@php($i=1)-->
                <!--@foreach($posts as $post)-->
                <!--<tr>-->
                    <!--<td>{{$i++}}</td>-->
                    <!--<td>{{$post->Job_title}}</td>-->
                    <!--<td>{{$post->Job_Description}}</td>-->
                    <!--<td>-->
                        <!--<a href="{{route('post.show',['post'=>$post->id])}}">Details</a>-->
                    <!--</td>-->

                    <!--{{&#45;&#45;<td><img src="{{asset($product->product_image)}}" alt="" width="150px" height="200px"> </td>&#45;&#45;}}-->
                    <!--{{&#45;&#45;<td>{{$product->publication_status==1?'Published':'Un-Published'}}</td>&#45;&#45;}}-->

                    <!--{{&#45;&#45;<td>&#45;&#45;}}-->

                    <!--{{&#45;&#45;<a href="{{route('product/details',['id'=>$product->id])}}" class="btn btn-info btn-xs" title="Details">&#45;&#45;}}-->
                        <!--{{&#45;&#45;<span class="glyphicon glyphicon-zoom-out"></span>&#45;&#45;}}-->
                        <!--{{&#45;&#45;</a>&#45;&#45;}}-->
                    <!--{{&#45;&#45;@if($product->publication_status==1)&#45;&#45;}}-->
                    <!--{{&#45;&#45;<a href="{{route('product/publish',['id'=>$product->id])}}" class="btn btn-info btn-xs" title="Published">&#45;&#45;}}-->
                        <!--{{&#45;&#45;<span class="glyphicon glyphicon-arrow-up"></span>&#45;&#45;}}-->
                        <!--{{&#45;&#45;</a>&#45;&#45;}}-->
                    <!--{{&#45;&#45;@else&#45;&#45;}}-->
                    <!--{{&#45;&#45;<a href="{{route('product/un-publish',['id'=>$product->id])}}" class="btn btn-warning btn-xs"  title="Un-Published">&#45;&#45;}}-->
                        <!--{{&#45;&#45;<span class="glyphicon glyphicon-arrow-down"></span>&#45;&#45;}}-->
                        <!--{{&#45;&#45;</a>&#45;&#45;}}-->
                    <!--{{&#45;&#45;@endif&#45;&#45;}}-->
                    <!--{{&#45;&#45;<a href="{{route('product-edit',['id'=>$product->id])}}" class="btn btn-success btn-xs">&#45;&#45;}}-->
                        <!--{{&#45;&#45;<span class="glyphicon glyphicon-edit"></span>&#45;&#45;}}-->
                        <!--{{&#45;&#45;</a>&#45;&#45;}}-->
                    <!--{{&#45;&#45;<a href="{{route('product/delete',['id'=>$product->id])}}" class="btn btn-danger btn-xs"&#45;&#45;}}-->
                           <!--{{&#45;&#45;onclick="return confirm('Are you sure?')">&#45;&#45;}}-->
                        <!--{{&#45;&#45;<span class="glyphicon glyphicon-trash"></span>&#45;&#45;}}-->
                        <!--{{&#45;&#45;</a>&#45;&#45;}}-->
                    <!--{{&#45;&#45;</td>&#45;&#45;}}-->
                <!--</tr>-->
                <!--@endforeach-->
                <!--</tbody>-->
            </table>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Create",
        // created() {
        // this.$axios.get('/post').then(res=>{
        //     console.log(res)
        // }).catch(err=>{
        //     alert('No Data')
        // })
        // }
    }
</script>

<style scoped>

</style>