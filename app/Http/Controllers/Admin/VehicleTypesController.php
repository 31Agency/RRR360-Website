<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Destroy\MassDestroyVehicleTypeRequest;
use App\Http\Requests\Store\StoreVehicleTypeRequest;
use App\Http\Requests\Update\UpdateVehicleTypeRequest;
use App\Models\VehicleType;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class VehicleTypesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('vehicle_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vehicle_types = VehicleType::all();

        return view('admin.vehicle-types.index', compact('vehicle_types'));
    }

    public function create()
    {
        abort_if(Gate::denies('vehicle_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.vehicle-types.create');
    }

    public function store(StoreVehicleTypeRequest $request)
    {
        $vehicle_type = VehicleType::create($request->all());

        return redirect()->route('admin.vehicle-types.index');
    }

    public function edit(VehicleType $vehicle_type)
    {
        abort_if(Gate::denies('vehicle_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.vehicle-types.edit', compact('vehicle_type'));
    }

    public function update(UpdateVehicleTypeRequest $request, VehicleType $vehicle_type)
    {
        $vehicle_type->update($request->all());

        return redirect()->route('admin.vehicle-types.index');
    }

    public function show(VehicleType $vehicle_type)
    {
        abort_if(Gate::denies('vehicle_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.vehicle-types.show', compact('vehicle_type'));
    }

    public function destroy(VehicleType $vehicle_type)
    {
        abort_if(Gate::denies('vehicle_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vehicle_type->delete();

        return back();
    }

    public function massDestroy(MassDestroyVehicleTypeRequest $request)
    {
        VehicleType::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
