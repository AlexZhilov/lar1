@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>edit post #{{ $post->id }}</h1>

                <form class="row g-3" action="{{ route('admin.post.update', $post->id) }}" method="post">
                    @csrf
                    @method('patch')
                    <div class="col-md-6">
                        <label for="title" class="form-label">title</label>
                        <input type="text" class="form-control" name="title" id="title" value="{{ $post->title }}">
                    </div>
                    {{--                    <div class="col-md-6">--}}
                    {{--                        <label for="file" class="form-label">img</label>--}}
                    {{--                        <input type="file" class="form-control" name="img" id="file">--}}
                    {{--                    </div>--}}
                    <div class="col-12">
                        <label for="text" class="form-label">text</label>
                        <textarea class="form-control" id="text" name="text" placeholder="text...">{{ $post->text }}</textarea>
                    </div>

                    <div class="form-group col-6">
                        <label for="inputState">Category</label>
                        <select id="inputState" class="form-control" name="category_id">

                            @foreach($categories as $category)

                                <option {{ $category->id == $post->category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->title }}</option>

                            @endforeach

                        </select>
                    </div>

                    <div class="form-group col-6">

                        <label for="inputState">tags</label>
                        <select multiple id="inputState" class="form-control" name="tag[]">

                            @foreach($tags as $tag)

                                <option
                                    @foreach($post->tags as $postTag)
                                    {{ $postTag->id == $tag->id ? 'selected' : ''}}
                                    @endforeach
                                    value="{{ $tag->id }}">{{ $tag->title }}</option>

                            @endforeach

                        </select>
                    </div>

                    <div class="col-12">
                        <a href="{{ route('admin.post.view', $post->id) }}" class="btn btn-light">cancel</a>
                        <input type="submit" class="btn btn-primary" value="update post">
                    </div>


                </form>


            </div>
        </div>
    </div>
@endsection
