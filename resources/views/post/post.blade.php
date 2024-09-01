@extends('layout')
@section('title', 'post')
@section('content')
    <div class="row ">
        <div class=" my-2 col-md-6 mx-auto">
            @if ($post->image)
                <img class="img-fluid text-center" src="{{ asset('images/' . $post->image) }}" alt="">
            @else
                <img class=" card-img-top" src="https://placehold.co/200x100?text=Image" alt="">
            @endif


            <p style="font-weight:bold; font-size:x-large"> {{ $post->title }}</p>

            <div style=" font-size:x-large ">
                <p> {{ $post->description }}</p>
            </div>
            <hr>
            @if (count($post->comment))
                <div class="mt-4">
                    <h3>Comment</h3>
                    <p>

                        @foreach ($post->comment as $comment)
                            <div class="row pt-3 align-items-center">
                                <div class="col-2  ">
                                    <img src="{{ asset('images/user.svg') }}" class="rounded-circle" width="60"
                                        style="height:60px" alt="">
                                </div>
                                <p class="col-6">
                                    {{ $comment->description }}
                                </p>
                            </div>
                            <hr class="mx-auto " width="90%">
                        @endforeach

                    </p>
                </div>

            @endif
            <div class="px-3">
                <form action="{{ route('comment.store') }}" method="POST">
                    @csrf
                    <label for="description">Comment</label>
                    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <button type="submit" class="btn btn-outline-primary my-4">Save</button>
                </form>
            </div>
        </div>
    </div>
@endsection
