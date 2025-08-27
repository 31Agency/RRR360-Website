<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Store\StoreOrderByGuestRequest;
use App\Models\Order;
use App\Models\VehicleType;
use Illuminate\Http\Request;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $vehicle_types = VehicleType::all()->pluck('title_en', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('client.orders.index', compact('vehicle_types'));
    }

    public function store(StoreOrderByGuestRequest $request)
    {
        $request['ip'] = $request->ip();

        $order = Order::create($request->validated());

        return redirect()->route('orders.show', [$order->id]);
    }

    public function show(Order $order)
    {
        abort_if($_SERVER['REMOTE_ADDR'] != $order->ip, Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('client.orders.show', compact('order'));
    }

}
