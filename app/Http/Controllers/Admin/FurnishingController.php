<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Destroy\MassDestroyFurnishingRequest;
use App\Http\Requests\Store\StoreFurnishingRequest;
use App\Http\Requests\Update\UpdateFurnishingRequest;
use App\Models\Furnishing;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class FurnishingController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('furnishing_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $furnishings = Furnishing::all();

        return view('admin.furnishings.index', compact('furnishings'));
    }

    public function create()
    {
        abort_if(Gate::denies('furnishing_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.furnishings.create');
    }

    public function store(StoreFurnishingRequest $request)
    {
        $furnishing = Furnishing::create($request->all());

        return redirect()->route('admin.furnishings.index')->with('message', 'The Furnishing has been created.');
    }

    public function edit(Furnishing $furnishing)
    {
        abort_if(Gate::denies('furnishing_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.furnishings.edit', compact('furnishing'));
    }

    public function update(UpdateFurnishingRequest $request, Furnishing $furnishing)
    {
        $furnishing->update($request->all());

        return redirect()->route('admin.furnishings.index')->with('message', 'The Furnishing has been updated.');
    }

    public function show(Furnishing $furnishing)
    {
        abort_if(Gate::denies('furnishing_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.furnishings.show', compact('furnishing'));
    }

    public function destroy(Furnishing $furnishing)
    {
        abort_if(Gate::denies('furnishing_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $furnishing->delete();

        return back();
    }

    public function massDestroy(MassDestroyFurnishingRequest $request)
    {
        Furnishing::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
