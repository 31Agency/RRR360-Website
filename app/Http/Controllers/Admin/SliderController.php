<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\Destroy\MassDestroySliderRequest;
use App\Http\Requests\Store\StoreSliderRequest;
use App\Http\Requests\Update\UpdateSliderRequest;
use App\Models\Slider;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class SliderController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('slider_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sliders = Slider::all();

        return view('admin.sliders.index', compact('sliders'));
    }

    public function create()
    {
        abort_if(Gate::denies('slider_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.sliders.create');
    }

    public function store(StoreSliderRequest $request)
    {
        $slider = Slider::create($request->all());

        if ($request->input('picture', false)) {
            $slider->addMedia(storage_path('tmp/uploads/' . $request->input('picture')))->toMediaCollection('picture');
        }

        if ($request->input('video', false)) {
            $slider->addMedia(storage_path('tmp/uploads/' . $request->input('video')))->toMediaCollection('video');
        }

        return redirect()->route('admin.sliders.index');
    }

    public function edit(Slider $slider)
    {
        abort_if(Gate::denies('slider_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.sliders.edit', compact('slider'));
    }

    public function update(UpdateSliderRequest $request, Slider $slider)
    {
        $slider->update($request->all());

        if ($request->input('picture', false)) {
            if (!$slider->picture || $request->input('picture') !== $slider->picture->file_name) {
                $slider->addMedia(storage_path('tmp/uploads/' . $request->input('picture')))->toMediaCollection('picture');
            }
        } elseif ($slider->picture) {
            $slider->picture->delete();
        }

        if ($request->input('video', false)) {
            if (!$slider->video || $request->input('video') !== $slider->video->file_name) {
                $slider->addMedia(storage_path('tmp/uploads/' . $request->input('video')))->toMediaCollection('video');
            }
        } elseif ($slider->video) {
            $slider->video->delete();
        }

        return redirect()->route('admin.sliders.index');
    }

    public function show(Slider $slider)
    {
        abort_if(Gate::denies('slider_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.sliders.show', compact('slider'));
    }

    public function destroy(Slider $slider)
    {
        abort_if(Gate::denies('slider_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $slider->delete();

        return back();
    }

    public function massDestroy(MassDestroySliderRequest $request)
    {
        Slider::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
