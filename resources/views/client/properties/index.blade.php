@extends('layouts.app')
@section('content')

    <section class="AllPropertiesPage">
        <div class="container">
            <div class="PropertiesFilter">
                <button type="button" onclick="$(this).find('a')[0].click()" class="{{ !isset($_GET['category']) ? 'ActivePropertiesFilter' : '' }}">
                    <a href="{{ route('properties.index') }}" class="d-none"></a>
                    Random
                </button>
                @foreach($categories as $key => $category)
                    <button type="button" onclick="$(this).find('a')[0].click()" class="{{ isset($_GET['category']) && $_GET['category'] == $category->id ? 'ActivePropertiesFilter' : '' }}">
                        <a href="{{ route('properties.index', ['category' => $category->id]) }}" class="d-none"></a>
                        {{ $category->title ?? '' }}
                    </button>
                @endforeach
            </div>

            <div class="PropertiesGH">
                @foreach($properties as $key => $property)
                    <!-- Card 1 -->
                    <div class="PropertyItem" onclick="$(this).find('a')[0].click()">
                        <h6>
                            <div class="setbg" rel="{{ asset('') }}RRR360/Requirements/IMG/IMGs.png"></div>
                            {{ $property->photos->count() ?? 0 }}
                        </h6>
                        <a href="{{ route('properties.show', [$property->id]) }}" class="d-none"></a>
                        <img class="setsrc PropertyItemThumb"
                             src="{{ $property->photo->thumbnail ?? '' }}">
                        <div class="PropertyItemDetails">
                            <h4>{{ $property->title ?? '' }}</h4>
                            <label><i class="fa fa-map-marker-alt"></i> {{ $property->location ?? '' }}</label>
                            <h5>
                                @foreach($property->specifications as $sub_key => $specification)
                                    <u>{{ $specification->title ?? '' }}</u>
                                @endforeach
                            </h5>
                            <button type="button">
                                Explore
                                <div class="setbg" rel="{{ asset('') }}RRR360/Requirements/IMG/Discover.png"></div>
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="PropertiesPagination">
                @for($page = 1; $page <= $properties->lastPage(); $page++)
                    <a href="{{ $properties->url($page) }}"
                       class="{{ $page == $properties->currentPage() ? 'ActivePage' : '' }}">
                        {{ $page }}
                    </a>
                @endfor
            </div>
        </div>
    </section>

@endsection
@section('scripts')
    @parent

@endsection
