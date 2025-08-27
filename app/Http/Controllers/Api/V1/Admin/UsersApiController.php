<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\CheckIn;
use App\Http\Controllers\Controller;
use App\Http\Requests\Store\StoreUserRequest;
use App\Http\Requests\Update\UpdateUserRequest;
use App\Http\Resources\Admin\UserResource;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UsersApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new UserResource(User::with(['roles', 'CheckINs', 'CheckOUTs'])->orderBy('id', 'DESC')->get());
    }

    public function report(Request $request)
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if (isset($request['date']))
        {
            $Checks = User::select('id', 'name', 'email', 'phone')
                ->whereHas('Checks', function($q) use ($request) {
                    $q->where('date', $request['date']);
                })
                ->with('Checks', function($q) use ($request) {
                    $q->select( 'date', 'user_id')->where('date', $request['date'])->orderBy('id', 'DESC');
                })
                ->get();
            $CheckIn  = CheckIn::with('user')->where('date', $request['date'])->get();
            $CheckOut = CheckIn::with('user')->where('date', $request['date'])->get();

        }
        else
        {
            $Checks = User::select('id', 'name', 'email', 'phone')
                ->whereHas('Checks', function($q){
                    $q->whereBetween('date', [date('Y-m-d', strtotime('-1 week')), date('Y-m-d')]);
                })
                ->with('Checks', function($q){
                    $q
                        ->orderBy('id', 'DESC')
                        ->whereBetween('date', [date('Y-m-d', strtotime('-1 week')), date('Y-m-d')])
                    ;
                })
                ->get();
            $CheckIn  = CheckIn::with('user')->whereBetween('date', [date('Y-m-d', strtotime('-1 week')), date('Y-m-d')])->get();
            $CheckOut = CheckIn::with('user')->whereBetween('date', [date('Y-m-d', strtotime('-1 week')), date('Y-m-d')])->get();
        }

        return new UserResource([
            'Checks'   => $Checks,
            'CheckIn'  => $CheckIn,
            'CheckOut' => $CheckOut,
        ]);
    }

    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->all());
        $user->roles()->sync($request->input('roles', []));

        return (new UserResource($user))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(User $user)
    {
        abort_if(Gate::denies('user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $Checks = User::where('id', $user->id)
            ->select('id')
            ->whereHas('Checks')
            ->with('Checks', function($q){
                $q->orderBy('id', 'DESC');
            })
            ->first();


        return new UserResource([
            'UserInfo' => $user->load(['roles', 'CheckINs', 'CheckOUTs']),
            'Checks'   => $Checks,
        ]);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->all());
        $user->roles()->sync($request->input('roles', []));

        return (new UserResource($user))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(User $user)
    {
        abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
