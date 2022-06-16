@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>post page</h1>

                <a href="{{ route('post.create') }}" class="btn btn-primary mb-3">create post</a>

                @foreach($posts as $post)
                    <div>
                        <a href="{{ route('post.view', ['post' => $post->id]) }}">{{ $post->title }}</a>
                        <a href="{{ route('post.edit', ['post' => $post->id]) }}">[edit]</a>
                        <br>
                        <span>{{ $post->category->title }}</span>
                        @foreach($post->tags as $tag)
                            <small>[{{ $tag->title }}]</small>
                        @endforeach
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection
