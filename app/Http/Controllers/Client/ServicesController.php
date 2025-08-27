<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function index(Request $request)
    {
        $services = Service::orderBy('id', 'DESC')->paginate(9);

        return view('client.services.index', compact('services'));
    }

    public function show(Service $service)
    {
        $related_services = Service::whereNot('id', $service->id)->inRandomOrder()->get();

        return view('client.services.show', compact('service', 'related_services'));
    }
}
