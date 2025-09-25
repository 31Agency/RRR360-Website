<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Destroy\MassDestroySpecificationRequest;
use App\Http\Requests\Store\StoreSpecificationRequest;
use App\Http\Requests\Update\UpdateSpecificationRequest;
use App\Models\Property;
use App\Models\Section;
use App\Models\Specification;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class SpecificationController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('specification_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $specifications = Specification::all();

        return view('admin.specifications.index', compact('specifications'));
    }

    public function create()
    {
        abort_if(Gate::denies('specification_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sections = Section::all()->pluck('title_en', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.specifications.create', compact('sections'));
    }

    public function store(StoreSpecificationRequest $request)
    {
        $specification = Specification::create($request->all());

        return redirect()->route('admin.specifications.index')->with('message', 'The specification has been created.');
    }

    public function edit(Specification $specification)
    {
        abort_if(Gate::denies('specification_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sections = Section::all()->pluck('title_en', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.specifications.edit', compact('specification', 'sections'));
    }

    public function update(UpdateSpecificationRequest $request, Specification $specification)
    {
        $specification->update($request->all());

        return redirect()->route('admin.specifications.index')->with('message', 'The specification has been updated.');
    }

    public function show(Specification $specification)
    {
        abort_if(Gate::denies('specification_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.specifications.show', compact('specification'));
    }

    public function destroy(Specification $specification)
    {
        abort_if(Gate::denies('specification_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $specification->delete();

        return back();
    }

    public function massDestroy(MassDestroySpecificationRequest $request)
    {
        Specification::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
