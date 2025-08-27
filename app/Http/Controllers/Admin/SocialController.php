<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\Destroy\MassDestroySocialRequest;
use App\Http\Requests\Store\StoreSocialRequest;
use App\Http\Requests\Update\UpdateSocialRequest;
use App\Models\Social;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class SocialController extends Controller
{
    use MediaUploadingTrait;
    public function index()
    {
        abort_if(Gate::denies('social_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $socials = Social::all();

        return view('admin.socials.index', compact('socials'));
    }

    public function create()
    {
        abort_if(Gate::denies('social_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.socials.create');
    }

    public function store(StoreSocialRequest $request)
    {
        $social = Social::create($request->all());

        if ($request->input('photo', false)) {
            $social->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
        }

        return redirect()->route('admin.socials.index');
    }

    public function edit(Social $social)
    {
        abort_if(Gate::denies('social_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.socials.edit', compact('social'));
    }

    public function update(UpdateSocialRequest $request, Social $social)
    {
        $social->update($request->all());

        if ($request->input('photo', false)) {
            if (!$social->photo || $request->input('photo') !== $social->photo->file_name) {
                $social->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
            }
        } elseif ($social->photo) {
            $social->photo->delete();
        }

        return redirect()->route('admin.socials.index');
    }

    public function show(Social $social)
    {
        abort_if(Gate::denies('social_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.socials.show', compact('social'));
    }

    public function destroy(Social $social)
    {
        abort_if(Gate::denies('social_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $social->delete();

        return back();
    }

    public function massDestroy(MassDestroySocialRequest $request)
    {
        Social::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
