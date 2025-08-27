@extends('layouts.customize-admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.article.title') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.article.fields.id') }}
                        </th>
                        <td>
                            {{ $article->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.article.fields.article_id') }}
                        </th>
                        <td>
                            {{ $article->article->title_en ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.article.fields.title_en') }}
                        </th>
                        <td>
                            {{ $article->title_en ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.article.fields.title_ar') }}
                        </th>
                        <td>
                            {{ $article->title_ar ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.article.fields.description_en') }}
                        </th>
                        <td>
                            {{ $article->description_en ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.article.fields.description_ar') }}
                        </th>
                        <td>
                            {{ $article->description_ar ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.article.fields.full_description_en') }}
                        </th>
                        <td>
                            {{ $article->full_description_en ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.article.fields.full_description_ar') }}
                        </th>
                        <td>
                            {{ $article->full_description_ar ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.article.fields.photo') }}
                        </th>
                        <td>
                            @if($article->photo)
                                <img src="{{ $_SERVER['REMOTE_ADDR'] != "127.0.0.1" ? str_replace('localhost/storage', $_SERVER['SERVER_NAME'].'/system/storage/app/public' , $article->photo->getUrl('thumb')) : str_replace('localhost', 'localhost:8000', $article->photo->getUrl('thumb')) }}" width="100px">
                            @else
                                <img src="#" width="100px">
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>

        <nav class="mb-3">
            <div class="nav nav-tabs">

            </div>
        </nav>
        <div class="tab-content">

        </div>
    </div>
</div>
@endsection
