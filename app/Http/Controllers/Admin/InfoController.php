<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\Destroy\MassDestroyInfoRequest;
use App\Http\Requests\Store\StoreInfoRequest;
use App\Http\Requests\Update\UpdateInfoRequest;
use App\Models\Info;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class InfoController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('info_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $infos = Info::all();

        return view('admin.info.index', compact('infos'));
    }

    public function create()
    {
        abort_if(Gate::denies('info_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.info.create');
    }

    public function store(StoreInfoRequest $request)
    {
        $info = Info::create($request->all());

        if ($request->input('logo', false)) {
            $info->addMedia(storage_path('tmp/uploads/' . $request->input('logo')))->toMediaCollection('logo');
        }

        if ($request->input('support', false)) {
            $info->addMedia(storage_path('tmp/uploads/' . $request->input('support')))->toMediaCollection('support');
        }

        if ($request->input('footer', false)) {
            $info->addMedia(storage_path('tmp/uploads/' . $request->input('footer')))->toMediaCollection('footer');
        }

        if ($request->input('favicon', false)) {
            $info->addMedia(storage_path('tmp/uploads/' . $request->input('favicon')))->toMediaCollection('favicon');
        }

        if ($request->input('about_photo', false)) {
            $info->addMedia(storage_path('tmp/uploads/' . $request->input('about_photo')))->toMediaCollection('about_photo');
        }

        if ($request->input('about_video', false)) {
            $info->addMedia(storage_path('tmp/uploads/' . $request->input('about_video')))->toMediaCollection('about_video');
        }

        return redirect()->route('admin.info.index');
    }

    public function edit(Info $info)
    {
        abort_if(Gate::denies('info_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.info.edit', compact('info'));
    }

    public function update(UpdateInfoRequest $request, Info $info)
    {
        $info->update($request->all());

        if ($request->input('logo', false)) {
            if (!$info->logo || $request->input('logo') !== $info->logo->file_name) {
                $info->addMedia(storage_path('tmp/uploads/' . $request->input('logo')))->toMediaCollection('logo');
            }
        } elseif ($info->logo) {
            $info->logo->delete();
        }

        if ($request->input('support', false)) {
            if (!$info->support || $request->input('support') !== $info->support->file_name) {
                $info->addMedia(storage_path('tmp/uploads/' . $request->input('support')))->toMediaCollection('support');
            }
        } elseif ($info->support) {
            $info->support->delete();
        }

        if ($request->input('footer', false)) {
            if (!$info->footer || $request->input('footer') !== $info->footer->file_name) {
                $info->addMedia(storage_path('tmp/uploads/' . $request->input('footer')))->toMediaCollection('footer');
            }
        } elseif ($info->footer) {
            $info->footer->delete();
        }

        if ($request->input('favicon', false)) {
            if (!$info->favicon || $request->input('favicon') !== $info->favicon->file_name) {
                $info->addMedia(storage_path('tmp/uploads/' . $request->input('favicon')))->toMediaCollection('favicon');
            }
        } elseif ($info->favicon) {
            $info->favicon->delete();
        }

        if ($request->input('about_photo', false)) {
            if (!$info->about_photo || $request->input('about_photo') !== $info->about_photo->file_name) {
                $info->addMedia(storage_path('tmp/uploads/' . $request->input('about_photo')))->toMediaCollection('about_photo');
            }
        } elseif ($info->about_photo) {
            $info->about_photo->delete();
        }

        if ($request->input('about_video', false)) {
            if (!$info->about_video || $request->input('about_video') !== $info->about_video->file_name) {
                $info->addMedia(storage_path('tmp/uploads/' . $request->input('about_video')))->toMediaCollection('about_video');
            }
        } elseif ($info->about_video) {
            $info->about_video->delete();
        }

        return redirect()->route('admin.info.index');
    }

    public function show(Info $info)
    {
        abort_if(Gate::denies('info_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.info.show', compact('info'));
    }

    public function destroy(Info $info)
    {
        abort_if(Gate::denies('info_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $info->delete();

        return back();
    }

    public function massDestroy(MassDestroyInfoRequest $request)
    {
        Info::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
