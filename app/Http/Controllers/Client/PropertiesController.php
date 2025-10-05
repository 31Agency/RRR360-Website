<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Furnishing;
use App\Models\Property;
use App\Models\Section;
use App\Models\Specification;
use App\Models\Status;
use Illuminate\Http\Request;

class PropertiesController extends Controller
{
    public function index(Request $request)
    {
        $categories     = Category::whereHas('properties')->get();
        $furnishings    = Furnishing::whereHas('properties')->get();
        $statuses       = Status::whereHas('properties')->get();
        $specifications = Specification::whereHas('properties')->get();
        $areas          = Specification::whereHas('section', function($q){$q->where('title_en', 'LIKE', '%neighborhood%')->orWhere('title_en', 'LIKE', '%area%');})->whereHas('properties')->get();
        $properties     = Property::search($request)->orderBy('id', 'DESC')->paginate(9);

        return view('client.properties.index', compact('properties', 'categories', 'furnishings', 'statuses', 'specifications', 'areas'));
    }

    public function show(Property $property)
    {
        $sections = Section::whereHas('specifications', function ($q) use ($property) {
            $q->whereHas('properties', function ($q) use ($property) {
                $q->where('id', $property->id);
            });
        })
            ->with(['specifications' => function ($q) use ($property) {
                $q->whereHas('properties', function ($q) use ($property) {
                    $q->where('id', $property->id);
                });
            }])
            ->get();

        // Group by count of specifications
        $sectionsGrouped = $sections->groupBy(function($section) {
            return $section->specifications->count() === 1 ? 'single' : 'multiple';
        });


        $related_properties = Property::whereNot('id', $property->id)->inRandomOrder()->take(6)->get();

        return view('client.properties.show', compact('property', 'related_properties', 'sections', 'sectionsGrouped'));
    }

    public function json(Request $request)
    {
        $take = $request['take'] ?? 6;

        $properties = Property::search($request)->orderBy('id', 'DESC')->paginate($take);

        $properties->load('specifications', 'floor', 'category');

        return response()->json($properties);
    }
}
