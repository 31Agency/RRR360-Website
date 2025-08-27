<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\Destroy\MassDestroyTeamRequest;
use App\Http\Requests\Store\StoreTeamRequest;
use App\Http\Requests\Update\UpdateTeamRequest;
use App\Models\Team;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class TeamController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('team_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $teams = Team::all();

        return view('admin.teams.index', compact('teams'));
    }

    public function create()
    {
        abort_if(Gate::denies('team_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.teams.create');
    }

    public function store(StoreTeamRequest $request)
    {
        $team = Team::create($request->all());

        if ($request->input('photo', false)) {
            $team->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
        }

        return redirect()->route('admin.teams.index');
    }

    public function edit(Team $team)
    {
        abort_if(Gate::denies('team_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.teams.edit', compact('team'));
    }

    public function update(UpdateTeamRequest $request, Team $team)
    {
        $team->update($request->all());

        if ($request->input('photo', false)) {
            if (!$team->photo || $request->input('photo') !== $team->photo->file_name) {
                $team->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
            }
        } elseif ($team->photo) {
            $team->photo->delete();
        }

        return redirect()->route('admin.teams.index');
    }

    public function show(Team $team)
    {
        abort_if(Gate::denies('team_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.teams.show', compact('team'));
    }

    public function destroy(Team $team)
    {
        abort_if(Gate::denies('team_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $team->delete();

        return back();
    }

    public function massDestroy(MassDestroyTeamRequest $request)
    {
        Team::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
