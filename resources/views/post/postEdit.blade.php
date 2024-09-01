@extends('layout')  
@section('title', 'post')
@section('content')
<form action="{{route('post.update',$post->id)}}" method="POST" >
    @method("PUT")
    @csrf
        <label for="title" class="form-label"> Title</label>
        <input type="text" name="title" id="title"  class="form-control"   value="{{$post->title}}">
        <label for="desc" class="form-label"> description</label>
        <input type="text" name="desc" id="desc"  class="form-control" value="{{$post->description}}" >
      
         <button type="submit" class="btn btn-outline-primary my-4">Update</button>
    </form>
    @endsection