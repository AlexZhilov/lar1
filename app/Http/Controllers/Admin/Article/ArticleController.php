<?php

namespace App\Http\Controllers\Admin\Article;

use App\Http\Controllers\BaseController;
use App\Http\Filters\ArticleFilter;
use App\Http\Requests\Article\FilterRequest;
use App\Http\Requests\Article\StoreRequest;
use App\Models\Article;
use App\Models\ArticleCategory;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ArticleController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @param FilterRequest $request
     * @return Application|Factory|View
     * @throws BindingResolutionException
     */
    public function index(FilterRequest $request)
    {
        $data = $request->validated();
        $filter = app()->make(ArticleFilter::class, ['queryParams' => array_filter($data)]);
        $articles = Article::filter($filter)->paginate(10);
//        dd($articles);

        return view('admin.article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $categories = ArticleCategory::all();
        return view('admin.article.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        Article::create($data);

        return redirect()->route('article.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Article $article
     * @return Application|Factory|View
     */
    public function show(Article $article)
    {
        return view('admin.article.view', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param StoreRequest $request
     * @param Article $article
     * @return Application|Factory|View
     */
    public function edit(Article $article)
    {
        $categories = ArticleCategory::all();
        return view('admin.article.edit', compact('article', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreRequest $request
     * @param Article $article
     * @return Application|Factory|View
     */
    public function update(StoreRequest $request, Article $article)
    {
        $data = $request->validated();
        $article->update($data);
        return view('admin.article.view', compact('article'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Article $article
     * @return RedirectResponse
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('article.index');
    }
}
