<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Destroy\MassDestroyFloorRequest;
use App\Http\Requests\Store\StoreFloorRequest;
use App\Http\Requests\Update\UpdateFloorRequest;
use App\Models\Floor;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class FloorController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('floor_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $floors = Floor::all();

        return view('admin.floors.index', compact('floors'));
    }

    public function create()
    {
        abort_if(Gate::denies('floor_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.floors.create');
    }

    public function store(StoreFloorRequest $request)
    {
        $floor = Floor::create($request->all());

        return redirect()->route('admin.floors.index')->with('message', 'The Floor has been created.');
    }

    public function edit(Floor $floor)
    {
        abort_if(Gate::denies('floor_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.floors.edit', compact('floor'));
    }

    public function update(UpdateFloorRequest $request, Floor $floor)
    {
        $floor->update($request->all());

        return redirect()->route('admin.floors.index')->with('message', 'The Floor has been updated.');
    }

    public function show(Floor $floor)
    {
        abort_if(Gate::denies('floor_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.floors.show', compact('floor'));
    }

    public function destroy(Floor $floor)
    {
        abort_if(Gate::denies('floor_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $floor->delete();

        return back();
    }

    public function massDestroy(MassDestroyFloorRequest $request)
    {
        Floor::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
