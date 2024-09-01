@extends('layout')
@section('title', 'post')
@section('content')
    <div class="row ">
        <div class="d-flex justify-end">
            @if (Gate::allows('create-post'))
                <a href="{{ route('post.create') }}" style="font-size: large;font-weight: 600"> Create</a>
            @endif
        </div>
        @foreach ($posts as $post)
            <div class="col-4 my-2">
                <div class="card w-100" style="min-height: 410px">
                    <div style="min-height: 180px">
                        @if ($post->image)
                            <img class=" card-img-top" src="{{ asset('images/' . $post->image) }}" alt="">
                        @else
                            <img class=" card-img-top" src="https://placehold.co/200x100?text=Image" alt="">
                        @endif
                    </div>
                    <div class="card-body  d-flex flex-column " style="justify-content:space-between">
                        <div>
                            <h5 class="card-title"> {{ $post->title }}</h5>
                            <p class="card-text">{{ $post->description }}</p>
                        </div>
                        <div class="justify-content-end">
                            <a href="{{ route('post.show', $post->id) }}">read more</a>
                        </div>
                    </div>

                </div>

            </div>
            <!-- <div class="d-inline-block">
            <form action="/post/{{ $post->id }}" method="POST">
                @method('delete')
                @csrf

                <button type="submit" class="btn btn-outline-primary ">Delete</button>
            </form>
        </div>
        <div class="d-inline-block">
            <form action="/post/{{ $post->id }}/edit" method="GET">
                <a> <button type="submit" class="btn btn-outline-primary">Update</button> </a>
            </form>
        </div> -->
        @endforeach
    </div>
    </div>

@endsection
