<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\Destroy\MassDestroyStepRequest;
use App\Http\Requests\Store\StoreStepRequest;
use App\Http\Requests\Update\UpdateStepRequest;
use App\Models\Step;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class StepController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('step_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $steps = Step::all();

        return view('admin.steps.index', compact('steps'));
    }

    public function create()
    {
        abort_if(Gate::denies('step_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.steps.create');
    }

    public function store(StoreStepRequest $request)
    {
        $step = Step::create($request->all());

        if ($request->input('photo', false)) {
            $step->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
        }

        return redirect()->route('admin.steps.index');
    }

    public function edit(Step $step)
    {
        abort_if(Gate::denies('step_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.steps.edit', compact('step'));
    }

    public function update(UpdateStepRequest $request, Step $step)
    {
        $step->update($request->all());

        if ($request->input('photo', false)) {
            if (!$step->photo || $request->input('photo') !== $step->photo->file_name) {
                $step->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
            }
        } elseif ($step->photo) {
            $step->photo->delete();
        }

        return redirect()->route('admin.steps.index');
    }

    public function show(Step $step)
    {
        abort_if(Gate::denies('step_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.steps.show', compact('step'));
    }

    public function destroy(Step $step)
    {
        abort_if(Gate::denies('step_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $step->delete();

        return back();
    }

    public function massDestroy(MassDestroyStepRequest $request)
    {
        Step::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
