<?php


namespace App\Http\Controllers\Admin\Post;


use App\Http\Controllers\BaseController;
use App\Http\Filters\PostFilter;
use App\Http\Requests\Post\FilterRequest;
use App\Models\Post;

class IndexController extends BaseController
{

    public function __invoke(FilterRequest $request)
    {
//        dump($this->authorize('view', auth()->user()));
        $data = $request->validated();
        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);

        $posts = Post::filter($filter)
                    ->with('category')
                    ->with('tags')
                    ->where(['visible' => 1])
                    ->published()
                    ->paginate(10);

        return view('admin.post.index', compact('posts'));
    }
}
