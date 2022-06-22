@extends('layouts.admin')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <article>

                    <h2>{{ $article->title }}</h2>
                    <div class="content">
                        {{ $article->text }}
                    </div>
                    <form action="{{ route('article.destroy', $article->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <a href="{{ route('article.edit', $article->id) }}" class="btn btn-primary mt-3">edit post</a>
                        <input type="submit" value="delete" class="btn btn-danger mt-3">
                    </form>

                </article>
            </div>
        </div>

    </div>
@endsection
