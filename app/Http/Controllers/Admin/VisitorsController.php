<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Destroy\MassDestroyVisitorRequest;
use App\Http\Requests\Store\StoreVisitorRequest;
use App\Http\Requests\Update\UpdateVisitorRequest;
use App\Models\Visitor;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class VisitorsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('visitor_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $visitors = Visitor::all();

        return view('admin.visitors.index', compact('visitors'));
    }

    public function create()
    {
        abort_if(Gate::denies('visitor_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.visitors.create');
    }

    public function store(StoreVisitorRequest $request)
    {
        $visitor = Visitor::create($request->all());

        return redirect()->route('admin.visitors.index');
    }

    public function edit(Visitor $visitor)
    {
        abort_if(Gate::denies('visitor_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.visitors.edit', compact('visitor'));
    }

    public function update(UpdateVisitorRequest $request, Visitor $visitor)
    {
        $visitor->update($request->all());

        return redirect()->route('admin.visitors.index');
    }

    public function show(Visitor $visitor)
    {
        abort_if(Gate::denies('visitor_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.visitors.show', compact('visitor'));
    }

    public function destroy(Visitor $visitor)
    {
        abort_if(Gate::denies('visitor_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $visitor->delete();

        return back();
    }

    public function massDestroy(MassDestroyVisitorRequest $request)
    {
        Visitor::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
