<?php


namespace App\Http\Controllers\Admin\Post;


use App\Http\Controllers\BaseController;
use App\Http\Requests\Post\StoreRequest;
use App\Models\Post;

class UpdateController extends BaseController
{
    public function __invoke(StoreRequest $request, Post $post)
    {
        $data = $request->validated();

        $this->service->update($post, $data);

        return redirect()->route('admin.post.view', $post->id);
    }
}
