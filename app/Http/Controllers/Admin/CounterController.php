<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\Destroy\MassDestroyCounterRequest;
use App\Http\Requests\Store\StoreCounterRequest;
use App\Http\Requests\Update\UpdateCounterRequest;
use App\Models\Counter;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class CounterController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('counter_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $counters = Counter::all();

        return view('admin.counters.index', compact('counters'));
    }

    public function create()
    {
        abort_if(Gate::denies('counter_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.counters.create');
    }

    public function store(StoreCounterRequest $request)
    {
        $counter = Counter::create($request->all());

        if ($request->input('photo', false)) {
            $counter->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
        }

        return redirect()->route('admin.counters.index');
    }

    public function edit(Counter $counter)
    {
        abort_if(Gate::denies('counter_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.counters.edit', compact('counter'));
    }

    public function update(UpdateCounterRequest $request, Counter $counter)
    {
        $counter->update($request->all());

        if ($request->input('photo', false)) {
            if (!$counter->photo || $request->input('photo') !== $counter->photo->file_name) {
                $counter->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
            }
        } elseif ($counter->photo) {
            $counter->photo->delete();
        }

        return redirect()->route('admin.counters.index');
    }

    public function show(Counter $counter)
    {
        abort_if(Gate::denies('counter_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.counters.show', compact('counter'));
    }

    public function destroy(Counter $counter)
    {
        abort_if(Gate::denies('counter_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $counter->delete();

        return back();
    }

    public function massDestroy(MassDestroyCounterRequest $request)
    {
        Counter::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
