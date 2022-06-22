<?php


namespace App\Http\Controllers\Admin\Post;


use App\Http\Controllers\BaseController;
use App\Http\Requests\Post\StoreRequest;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
//        dd($data);
        $this->service->store($data);

        return redirect()->route('admin.post.index');
    }
}
