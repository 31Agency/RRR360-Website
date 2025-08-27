<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\Destroy\MassDestroyBranchRequest;
use App\Http\Requests\Store\StoreBranchRequest;
use App\Http\Requests\Update\UpdateBranchRequest;
use App\Models\Branch;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class BranchController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('branch_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $branches = Branch::all();

        return view('admin.branches.index', compact('branches'));
    }

    public function create()
    {
        abort_if(Gate::denies('branch_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.branches.create');
    }

    public function store(StoreBranchRequest $request)
    {
        $branch = Branch::create($request->all());

        if ($request->input('photo', false)) {
            $branch->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
        }

        return redirect()->route('admin.branches.index');
    }

    public function edit(Branch $branch)
    {
        abort_if(Gate::denies('branch_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.branches.edit', compact('branch'));
    }

    public function update(UpdateBranchRequest $request, Branch $branch)
    {
        $branch->update($request->all());

        if ($request->input('photo', false)) {
            if (!$branch->photo || $request->input('photo') !== $branch->photo->file_name) {
                $branch->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
            }
        } elseif ($branch->photo) {
            $branch->photo->delete();
        }

        return redirect()->route('admin.branches.index');
    }

    public function show(Branch $branch)
    {
        abort_if(Gate::denies('branch_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.branches.show', compact('branch'));
    }

    public function destroy(Branch $branch)
    {
        abort_if(Gate::denies('branch_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $branch->delete();

        return back();
    }

    public function massDestroy(MassDestroyBranchRequest $request)
    {
        Branch::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
