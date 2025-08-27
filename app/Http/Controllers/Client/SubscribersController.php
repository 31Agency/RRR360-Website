<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Store\StoreSubscriberByGuestRequest;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class SubscribersController extends Controller
{
    public function store(StoreSubscriberByGuestRequest $request)
    {
        $subscriber = Subscriber::create($request->validated());

        return redirect()->back()->with('message', 'Subscriber created.');
    }
}
