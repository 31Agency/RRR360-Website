<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\Destroy\MassDestroyPropertiesRequest;
use App\Http\Requests\Store\StorePropertiesRequest;
use App\Http\Requests\Update\UpdatePropertiesRequest;
use App\Models\Category;
use App\Models\Floor;
use App\Models\Furnishing;
use App\Models\Owner;
use App\Models\Property;
use App\Models\Section;
use App\Models\Specification;
use App\Models\Status;
use App\Models\System;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class PropertiesController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('property_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $properties = Property::all();

        return view('admin.properties.index', compact('properties'));
    }

    public function create()
    {
        abort_if(Gate::denies('property_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories  = Category::all()->pluck('title_en', 'id');
        $floors      = Floor::all()->pluck('title_en', 'id');
        $sections    = Section::all();
        $statuses    = Status::all()->pluck('title_en', 'id');
        $furnishings = Furnishing::all()->pluck('title_en', 'id');
        $systems     = System::all()->pluck('title_en', 'id');
        $owners      = Owner::all()->pluck('name', 'id');

        return view('admin.properties.create', compact('categories', 'sections', 'floors', 'statuses', 'furnishings', 'systems', 'owners'));
    }

    public function store(StorePropertiesRequest $request)
    {
        $property = Property::create($request->all());

        foreach ($request->input('photos', []) as $file) {
            $property->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('photos');
        }

        $property->specifications()->sync($request->input('specifications', []));
        $property->owners()->sync($request->input('owners', []));

        return redirect()->route('admin.properties.show', [$property->id]);
    }

    public function edit(Property $property)
    {
        abort_if(Gate::denies('property_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories  = Category::all()->pluck('title_en', 'id');
        $floors      = Floor::all()->pluck('title_en', 'id');
        $sections    = Section::all();
        $statuses    = Status::all()->pluck('title_en', 'id');
        $furnishings = Furnishing::all()->pluck('title_en', 'id');
        $systems     = System::all()->pluck('title_en', 'id');
        $owners      = Owner::all()->pluck('name', 'id');

        return view('admin.properties.edit', compact('property', 'categories', 'sections', 'floors', 'statuses', 'furnishings', 'systems', 'owners'));
    }

    public function update(UpdatePropertiesRequest $request, Property $property)
    {
        $property->update($request->all());

        if (count($property->photos) > 0) {
            foreach ($property->photos as $media) {
                if (!in_array($media->file_name, $request->input('photos', []))) {
                    $media->delete();
                }
            }
        }

        $media = $property->photos->pluck('file_name')->toArray();

        foreach ($request->input('photos', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $property->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('photos');
            }
        }

        $property->specifications()->sync($request->input('specifications', []));
        $property->owners()->sync($request->input('owners', []));

        return redirect()->route('admin.properties.show', [$property->id]);
    }

    public function show(Property $property)
    {
        abort_if(Gate::denies('property_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.properties.show', compact('property'));
    }

    public function destroy(Property $property)
    {
        abort_if(Gate::denies('property_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $property->delete();

        return back();
    }

    public function massDestroy(MassDestroyPropertiesRequest $request)
    {
        Property::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
