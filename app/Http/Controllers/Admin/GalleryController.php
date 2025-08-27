<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\Destroy\MassDestroyGalleryRequest;
use App\Http\Requests\Store\StoreGalleryRequest;
use App\Http\Requests\Update\UpdateGalleryRequest;
use App\Models\Gallery;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class GalleryController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('gallery_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $galleries = Gallery::all();

        return view('admin.galleries.index', compact('galleries'));
    }

    public function create()
    {
        abort_if(Gate::denies('gallery_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.galleries.create');
    }

    public function store(StoreGalleryRequest $request)
    {
        $gallery = Gallery::create($request->all());

        if ($request->input('photo', false)) {
            $gallery->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
        }

        return redirect()->route('admin.galleries.index');
    }

    public function edit(Gallery $gallery)
    {
        abort_if(Gate::denies('gallery_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.galleries.edit', compact('gallery'));
    }

    public function update(UpdateGalleryRequest $request, Gallery $gallery)
    {
        $gallery->update($request->all());

        if ($request->input('photo', false)) {
            if (!$gallery->photo || $request->input('photo') !== $gallery->photo->file_name) {
                $gallery->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
            }
        } elseif ($gallery->photo) {
            $gallery->photo->delete();
        }

        return redirect()->route('admin.galleries.index');
    }

    public function show(Gallery $gallery)
    {
        abort_if(Gate::denies('gallery_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.galleries.show', compact('gallery'));
    }

    public function destroy(Gallery $gallery)
    {
        abort_if(Gate::denies('gallery_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $gallery->delete();

        return back();
    }

    public function massDestroy(MassDestroyGalleryRequest $request)
    {
        Gallery::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
