@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Articles</h1>

                <a href="{{ route('article.create') }}" class="btn btn-primary mb-3">create article</a>

                @foreach($articles as $article)
                    <div>
                        <a href="{{ route('article.show', ['article' => $article->id]) }}">{{ $article->id }}. {{ $article->title }}</a>
                        <a href="{{ route('article.edit', ['article' => $article->id]) }}">[edit]</a>
                        <br>
                        <span>{{ $article->category->title }}</span>
                    </div>
                @endforeach

                {{ $articles->onEachSide(1)->withQueryString()->links() }}

            </div>
        </div>
    </div>

@endsection

@push('scripts')
<script>
    console.log('admin.article.index');
</script>
@endpush
