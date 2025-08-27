<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\Destroy\MassDestroyServiceRequest;
use App\Http\Requests\Store\StoreServiceRequest;
use App\Http\Requests\Update\UpdateServiceRequest;
use App\Models\Service;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class ServiceController extends Controller
{
    use MediaUploadingTrait;
    public function index()
    {
        abort_if(Gate::denies('service_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $services = Service::all();

        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        abort_if(Gate::denies('service_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.services.create');
    }

    public function store(StoreServiceRequest $request)
    {
        $service = Service::create($request->all());

        if ($request->input('photo', false)) {
            $service->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
        }

        if ($request->input('cover', false)) {
            $service->addMedia(storage_path('tmp/uploads/' . $request->input('cover')))->toMediaCollection('cover');
        }

        return redirect()->route('admin.services.index');
    }

    public function edit(Service $service)
    {
        abort_if(Gate::denies('service_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.services.edit', compact('service'));
    }

    public function update(UpdateServiceRequest $request, Service $service)
    {
        $service->update($request->all());

        if ($request->input('photo', false)) {
            if (!$service->photo || $request->input('photo') !== $service->photo->file_name) {
                $service->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
            }
        } elseif ($service->photo) {
            $service->photo->delete();
        }

        if ($request->input('cover', false)) {
            if (!$service->cover || $request->input('cover') !== $service->cover->file_name) {
                $service->addMedia(storage_path('tmp/uploads/' . $request->input('cover')))->toMediaCollection('cover');
            }
        } elseif ($service->cover) {
            $service->cover->delete();
        }

        return redirect()->route('admin.services.index');
    }

    public function show(Service $service)
    {
        abort_if(Gate::denies('service_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.services.show', compact('service'));
    }

    public function destroy(Service $service)
    {
        abort_if(Gate::denies('service_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $service->delete();

        return back();
    }

    public function massDestroy(MassDestroyServiceRequest $request)
    {
        Service::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
