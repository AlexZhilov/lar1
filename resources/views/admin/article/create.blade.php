@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>create new post</h1>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form class="row g-3" action="{{ route('article.store') }}" method="post">

                    @csrf
                    <div class="col-md-6">
                        <label for="title" class="form-label">Заголовок</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{ old('title') }}">
                        @error('title')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    {{--                    <div class="col-md-6">--}}
                    {{--                        <label for="file" class="form-label">img</label>--}}
                    {{--                        <input type="file" class="form-control" name="img" id="file">--}}
                    {{--                    </div>--}}
                    <div class="col-12">
                        <label for="text" class="form-label">text</label>
                        <textarea class="form-control @error('text') is-invalid @enderror" id="text" name="text" placeholder="text...">{{ old('text') }}</textarea>
                        @error('text')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group col-4">
                        <label for="inputState">Category</label>
                        <select id="inputState" class="form-control" name="category_id">

                            @foreach($categories as $category)

                                <option {{ old('category_id') == $category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->title }}</option>

                            @endforeach

                        </select>
                    </div>

                    <div class="col-12">
                        <input type="submit" class="btn btn-primary" value="save post">
                    </div>
                </form>


            </div>
        </div>
    </div>
@endsection
