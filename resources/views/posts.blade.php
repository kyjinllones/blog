@extends('index')
@section('content')
<div class="col-md-7">
    @if($posts->count()!=null)
    <table  class="table">
        <thead class=" thead-dark text-info">
            <th>User</th>
            <th class="">Post ID</th>
            <th class="">Post Title</th>
            <th class="">Post Created</th>
            <th class="">Post Updated</th>
            <th class="">Post Deleted</th>
            <th class="text-center"  colspan="4">Action</th>
        </thead>
        <tbody>
            @foreach($posts as $post)
            <tr>
                <td><a>{{$post->user->name}}</a></td>
                <td>{{$post->id}}</td>
                <td>{{$post->title}}</td>
                <td>{{$post->created_at}}</td>
                <td>{{$post->updated_at}}</td>
                <td class="text-danger">{{$post->deleted_at}}</td>
                <td><a  class="btn btn-success"
                    href="{{route('post.details', ['id'=>$post->id,'title'=>$post->title])}}"
                    data-toggle="tooltip" data-placement="top"
                    title="
                    {{strlen($post->content)>50 ? substr($post->content, 0, 50).'...':$post->content}}
                ">View</a></td>
                @if(Auth::user()->id == $post->user_id)
                <td><a  class="btn 
                    <?php
                         if(isset($post->deleted_at))
                          echo 'disabled';
                      ?>
                    btn-primary " href="{{route('post.edit',$post->id)}}">Edit</a></td>
                <td><a  class="btn 
                    <?php
                         if(isset($post->deleted_at))
                          echo 'disabled';
                      ?>
                    btn-danger " href="{{route('post.delete',$post->id)}}">Delete</a></td>
               @if(isset($post->deleted_at))
                <td><a class="btn btn-warning" href="{{ route('post.restore', $post->id) }}">Restore</a></td>
               @endif
               @endif
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <h4 class="text-secondary alert-warning">Not Found!!!</h4>
    @endif
</div>
<script lang="javascript" type="text/javascript">

$(function(){
    if($("td.text-danger").text().length<1){
        $("a.btn-user").addClass('disabled')
    }
})
</script>
@endsection
