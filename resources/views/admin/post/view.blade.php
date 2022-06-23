@extends('layouts.admin')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <article>

                    <h2>{{ $post->title }}</h2>
                    <div class="content">
                        {{ $post->text }}
                    </div>

                    @foreach($post->tags as $tag)
                        <span>[{{ $tag->title }}]</span>
                    @endforeach

                    <div>
                        <span>created:</span>
                        <span>{{ $post->created_at->diffForHumans() }}</span>
                    </div>

                    @if($post->updated_at != $post->created_at)
                        <div>
                            <span>updated:</span>
                            <span>{{ $post->updated_at->diffForHumans() }}</span>
                        </div>
                    @endif


                    <form action="{{ route('admin.post.destroy', $post->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <a href="{{ route('admin.post.edit', $post->id) }}" class="btn btn-primary mt-3">edit post</a>
                        <input type="submit" value="delete" class="btn btn-danger mt-3">
                    </form>

                </article>
            </div>
        </div>

    </div>
@endsection
