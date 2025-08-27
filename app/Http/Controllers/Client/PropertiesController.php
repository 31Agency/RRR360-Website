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
        $categories = Category::all();
        $properties = Property::search($request)->orderBy('id', 'DESC')->paginate(9);

        return view('client.properties.index', compact('properties', 'categories'));
    }

    public function show(Property $property)
    {
        $related_properties = Property::whereNot('id', $property->id)->inRandomOrder()->get();

        return view('client.properties.show', compact('property', 'related_properties'));
    }
}
