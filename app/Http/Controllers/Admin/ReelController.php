<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\Destroy\MassDestroyReelRequest;
use App\Http\Requests\Store\StoreReelRequest;
use App\Http\Requests\Update\UpdateReelRequest;
use App\Models\Reel;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class ReelController extends Controller
{
    use MediaUploadingTrait;
    public function index()
    {
        abort_if(Gate::denies('reel_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reels = Reel::all();

        return view('admin.reels.index', compact('reels'));
    }

    public function create()
    {
        abort_if(Gate::denies('reel_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.reels.create');
    }

    public function store(StoreReelRequest $request)
    {
        $reel = Reel::create($request->all());

        if ($request->input('photo', false)) {
            $reel->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
        }

        if ($request->input('video', false)) {
            $reel->addMedia(storage_path('tmp/uploads/' . $request->input('video')))->toMediaCollection('video');
        }

        return redirect()->route('admin.reels.index');
    }

    public function edit(Reel $reel)
    {
        abort_if(Gate::denies('reel_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.reels.edit', compact('reel'));
    }

    public function update(UpdateReelRequest $request, Reel $reel)
    {
        $reel->update($request->all());

        if ($request->input('photo', false)) {
            if (!$reel->photo || $request->input('photo') !== $reel->photo->file_name) {
                $reel->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
            }
        } elseif ($reel->photo) {
            $reel->photo->delete();
        }

        if ($request->input('video', false)) {
            if (!$reel->video || $request->input('video') !== $reel->video->file_name) {
                $reel->addMedia(storage_path('tmp/uploads/' . $request->input('video')))->toMediaCollection('video');
            }
        } elseif ($reel->video) {
            $reel->video->delete();
        }

        return redirect()->route('admin.reels.index');
    }

    public function show(Reel $reel)
    {
        abort_if(Gate::denies('reel_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.reels.show', compact('reel'));
    }

    public function destroy(Reel $reel)
    {
        abort_if(Gate::denies('reel_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reel->delete();

        return back();
    }

    public function massDestroy(MassDestroyReelRequest $request)
    {
        Reel::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
