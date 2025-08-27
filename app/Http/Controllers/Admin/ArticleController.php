<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\Destroy\MassDestroyArticleRequest;
use App\Http\Requests\Store\StoreArticleRequest;
use App\Http\Requests\Update\UpdateArticleRequest;
use App\Models\Article;
use Gate;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ArticleController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('article_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $articles = Article::all();

        return view('admin.articles.index', compact('articles'));
    }

    public function create()
    {
        abort_if(Gate::denies('article_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.articles.create');
    }

    public function store(StoreArticleRequest $request)
    {
        $request['created_by_id'] = Auth::user()->id;

        $article = Article::create($request->all());

        if ($request->input('photo', false)) {
            $article->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
        }

        return redirect()->route('admin.articles.index');
    }

    public function edit(Article $article)
    {
        abort_if(Gate::denies('article_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.articles.edit', compact('article'));
    }

    public function update(UpdateArticleRequest $request, Article $article)
    {
        $request['created_by_id'] = Auth::user()->id;

        $article->update($request->all());

        if ($request->input('photo', false)) {
            if (!$article->photo || $request->input('photo') !== $article->photo->file_name) {
                $article->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
            }
        } elseif ($article->photo) {
            $article->photo->delete();
        }

        return redirect()->route('admin.articles.index');
    }

    public function show(Article $article)
    {
        abort_if(Gate::denies('article_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.articles.show', compact('article'));
    }

    public function destroy(Article $article)
    {
        abort_if(Gate::denies('article_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $article->delete();

        return back();
    }

    public function massDestroy(MassDestroyArticleRequest $request)
    {
        Article::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
