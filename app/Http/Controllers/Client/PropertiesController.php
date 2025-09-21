<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertiesController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::whereHas('properties')->get();
        $properties = Property::search($request)->orderBy('id', 'DESC')->paginate(6);

        return view('client.properties.index', compact('properties', 'categories'));
    }

    public function show(Property $property)
    {
        $related_properties = Property::whereNot('id', $property->id)->inRandomOrder()->get();

        return view('client.properties.show', compact('property', 'related_properties'));
    }

    public function json(Request $request)
    {
        $take = $request['take'] ?? 8;

        $properties = Property::search($request)->orderBy('id', 'DESC')->take($take)->get();

        $properties->load('specifications');

        return response()->json($properties);
    }
}
