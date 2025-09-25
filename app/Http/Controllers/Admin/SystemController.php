<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Destroy\MassDestroySystemRequest;
use App\Http\Requests\Store\StoreSystemRequest;
use App\Http\Requests\Update\UpdateSystemRequest;
use App\Models\System;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class SystemController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('system_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $systems = System::all();

        return view('admin.systems.index', compact('systems'));
    }

    public function create()
    {
        abort_if(Gate::denies('system_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.systems.create');
    }

    public function store(StoreSystemRequest $request)
    {
        $system = System::create($request->all());

        return redirect()->route('admin.systems.index')->with('message', 'The System has been created.');
    }

    public function edit(System $system)
    {
        abort_if(Gate::denies('system_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.systems.edit', compact('system'));
    }

    public function update(UpdateSystemRequest $request, System $system)
    {
        $system->update($request->all());

        return redirect()->route('admin.systems.index')->with('message', 'The System has been updated.');
    }

    public function show(System $system)
    {
        abort_if(Gate::denies('system_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.systems.show', compact('system'));
    }

    public function destroy(System $system)
    {
        abort_if(Gate::denies('system_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $system->delete();

        return back();
    }

    public function massDestroy(MassDestroySystemRequest $request)
    {
        System::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
