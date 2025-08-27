<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\Destroy\MassDestroyLinkRequest;
use App\Http\Requests\Store\StoreLinkRequest;
use App\Http\Requests\Update\UpdateLinkRequest;
use App\Models\Link;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class LinkController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('link_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $links = Link::all();

        return view('admin.links.index', compact('links'));
    }

    public function create()
    {
        abort_if(Gate::denies('link_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.links.create');
    }

    public function store(StoreLinkRequest $request)
    {
        $link = Link::create($request->all());

        if ($request->input('photo', false)) {
            $link->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
        }

        return redirect()->route('admin.links.index');
    }

    public function edit(Link $link)
    {
        abort_if(Gate::denies('link_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.links.edit', compact('link'));
    }

    public function update(UpdateLinkRequest $request, Link $link)
    {
        $link->update($request->all());

        if ($request->input('photo', false)) {
            if (!$link->photo || $request->input('photo') !== $link->photo->file_name) {
                $link->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
            }
        } elseif ($link->photo) {
            $link->photo->delete();
        }

        return redirect()->route('admin.links.index');
    }

    public function show(Link $link)
    {
        abort_if(Gate::denies('link_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.links.show', compact('link'));
    }

    public function destroy(Link $link)
    {
        abort_if(Gate::denies('link_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $link->delete();

        return back();
    }

    public function massDestroy(MassDestroyLinkRequest $request)
    {
        Link::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
