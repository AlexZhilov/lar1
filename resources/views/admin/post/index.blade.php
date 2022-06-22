@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>posts page</h1>

                <a href="{{ route('admin.post.create') }}" class="btn btn-primary mb-3">create post</a>

                @foreach($posts as $post)
                    <div>
                        <a href="{{ route('admin.post.view', ['post' => $post->id]) }}">{{ $post->id }}. {{ $post->title }}</a>
                        <a href="{{ route('admin.post.edit', ['post' => $post->id]) }}">[edit]</a>
                        <br>
                        <span>{{ $post->category->title }}</span>
                        @foreach($post->tags as $tag)
                            <small>[{{ $tag->title }}]</small>
                        @endforeach
                    </div>
                @endforeach

                {{ $posts->onEachSide(1)->withQueryString()->links() }}

            </div>
        </div>
    </div>

@endsection

@push('scripts')
<script>
    console.log('admin.post.index');
</script>
@endpush
