<?php


namespace App\Http\Controllers\Admin\Post;


use App\Http\Controllers\Controller;
use App\Http\Requests\Post\FilterRequest;
use App\Repositories\PostRepository;

class IndexController extends Controller
{

    protected $posts;

    public function __construct(PostRepository $posts)
    {
        $this->posts = $posts;
    }

    public function __invoke(FilterRequest $request)
    {
        return view('admin.post.index',
            [ 'posts' => $this->posts->all( $request->validated() ) ]
        );
    }
}
