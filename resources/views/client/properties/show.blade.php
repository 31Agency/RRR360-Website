@extends('layouts.app')
@section('content')
    <section class="PropertyShowPage">
        <div class="container">
            <div class="PropertyShowPageInner">
                <div class="PropertyShowPageLeft">
                    <div class="ImageSlider">
                        <!-- Preview Image -->
                        <div class="PreviewWrapper">
                            <img id="PreviewImage" src="{{asset("RRR360/Requirements/IMG/IMGRF.jpg")}}"
                                 class="PreviewImage"
                                 alt="{{ $property->title ?? '' }} - {{ $property->location ?? '' }} - {{ $property->description ?? '' }}">
                        </div>

                        <!-- Thumbnails -->
                        <div class="ThumbnailWrapper">
                            @foreach($property->photos as $photo)
                                <img src="{{ $photo->thumbnail ?? asset('RRR360/Requirements/IMG/IMGRF.jpg') }}"
                                     class="Thumbnail" rel="{{$photo->url}}" onclick="changeImage($(this))"
                                     alt="{{ $property->title ?? '' }} - {{ $property->description ?? '' }}">
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="PropertyShowPageRight">
                    <div class="PropertyShowPageRightDetails">
                        <h1>{{ $property->title ?? '' }}</h1>
                        <label>
                            <i class="fa fa-map-marker-alt"></i>
                            {{ $property->location ?? '' }}
                        </label>
                        <h5>
                            <u>
                                <div class="setbg" rel="{{ asset('RRR360/Requirements/IMG/status.png') }}"></div>
                                Status :
                                <strong>{{ $property->status->title ?? '' }}</strong>
                            </u>

                            <u>
                                <div class="setbg" rel="{{ asset('RRR360/Requirements/IMG/furnishing.png') }}"></div>
                                Furnishing :
                                <strong>{{ $property->furnishing->title ?? '' }}</strong>
                            </u>

                            <u>
                                <div class="setbg" rel="{{ asset('RRR360/Requirements/IMG/floor.png') }}"></div>
                                Floor :
                                <strong>{{ $property->floor->title ?? '' }}</strong>
                            </u>

                            <u>
                                <div class="setbg" rel="{{ asset('RRR360/Requirements/IMG/bedrooms.png') }}"></div>
                                Bedrooms :
                                <strong>{{ $property->bedrooms ?? '' }}</strong>
                            </u>

                            <u>
                                <div class="setbg" rel="{{ asset('RRR360/Requirements/IMG/bathrooms.png') }}"></div>
                                Bathrooms :
                                <strong>{{ $property->bathrooms ?? '' }}</strong>
                            </u>

                            <u>
                                <div class="setbg" rel="{{ asset('RRR360/Requirements/IMG/master_bedrooms.png') }}"></div>
                                Master Bedrooms :
                                <strong>{{ $property->master_bedrooms ?? '' }}</strong>
                            </u>

                            <u>
                                <div class="setbg" rel="{{ asset('RRR360/Requirements/IMG/area.png') }}"></div>
                                Area :
                                <strong>{{ $property->area ?? '' }} m²</strong>
                            </u>

                            <u>
                                <div class="setbg" rel="{{ asset('RRR360/Requirements/IMG/building_age.png') }}"></div>
                                Building Age :
                                <strong>{{ $property->building_age ?? '' }}</strong>
                            </u>

                            <u>
                                <div class="setbg" rel="{{ asset('RRR360/Requirements/IMG/ref_no.png') }}"></div>
                                Ref No :
                                <strong>{{ $property->ref_no ?? '' }}</strong>
                            </u>

                            <u>
                                <div class="setbg" rel="{{ asset('RRR360/Requirements/IMG/outdoor_area.png') }}"></div>
                                Outdoor Area :
                                <strong>{{ $property->outdoor_area ?? '' }}</strong>
                            </u>

                            <u>
                                <div class="setbg" rel="{{ asset('RRR360/Requirements/IMG/tags.png') }}"></div>
                                Tags :
                                <strong>{{ $property->tags ?? '' }}</strong>
                            </u>

                            <u>
                                <div class="setbg" rel="{{ asset('RRR360/Requirements/IMG/availability_date.png') }}"></div>
                                Availability Date :
                                <strong>{{ $property->availability_date ?? '' }}</strong>
                            </u>
                        </h5>

                    </div>

                    {{-- Sections with 1 specification --}}
                    @if(isset($sectionsGrouped['single']) && count($sectionsGrouped['single']) > 0)
                        <div class="SingleSpecifications">
                            @foreach($sectionsGrouped['single'] ?? [] as $section)
                                <label>
                                    {{ $section->title ?? '' }}:
                                    @foreach($section->specifications as $specification)
                                        <strong>{{ $specification->title ?? '' }}</strong>
                                    @endforeach
                                </label>
                            @endforeach
                        </div>
                    @endif

                    {{-- Sections with multiple specifications --}}
                    @if(isset($sectionsGrouped['multiple']) && count($sectionsGrouped['multiple']) > 0)
                        @foreach($sectionsGrouped['multiple'] ?? [] as $section)
                            <div class="FAQItem" onclick="ExpandFAQ($(this))">
                                <div class="FAQItemInner">
                                    <h1>{{ $section->title ?? '' }}</h1>
                                    @foreach($section->specifications as $specification)
                                        <p class="animate__animated animate__fadeInDown">{{ $specification->title ?? '' }}</p>
                                    @endforeach
                                    <i class="fa fa-angle-down"></i>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    <div class="PropertyFullDescription">
                        {!! $property->description_en ?? '' !!}
                    </div>
                </div>
            </div>

            @if($related_properties->count() > 0)
                <div class="RelatedProperties">
                    <div class="RelatedPropertiesHeader">
                        <h3>Similar Properties</h3>
                        <p>
                            Explore a selection of properties that match your preferences.
                            These listings are chosen based on category, features, and location
                            to help you find the right fit faster.
                        </p>
                    </div>
                </div>

                <div class="PropertiesGH">
                    @foreach($related_properties as $related)
                        <div class="PropertyItem" onclick="$(this).find('a')[0].click()">
                            <h6>
                                <div class="setbg" rel="{{ asset('') }}RRR360/Requirements/IMG/IMGs.png"></div>
                                {{ $related->photos->count() ?? 0 }}
                            </h6>
                            <a href="{{ route('properties.show', [$related->id]) }}" class="d-none"></a>
                            <img class="setsrc PropertyItemThumb"
                                 src="{{ $related->photo->thumbnail ?? '' }}"
                                 alt="{{ $related->title ?? '' }} - {{ $related->description ?? '' }}">
                            <div class="PropertyItemDetails">
                                <h4>{{ $related->title ?? '' }}</h4>
                                <label>
                                    <i class="fa fa-map-marker-alt"></i>
                                    {{ $related->location ?? '' }}
                                </label>
                                <h5>
                                    @if($property->building_age)
                                        <u>{{ $property->building_age ?? '' }}</u>
                                    @endif
                                    @if($property->price_per)
                                        <u>{{ $property->price_per ?? '' }}</u>
                                    @endif
                                    @if($property->ref_no)
                                        <u>{{ $property->ref_no ?? '' }}</u>
                                    @endif
                                </h5>
                                <button type="button">
                                    Explore
                                    <div class="setbg" rel="{{ asset('') }}RRR360/Requirements/IMG/Discover.png"></div>
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
@endsection
@section('scripts')
    @parent
    <script>
        function changeImage(el) {
            $("#PreviewImage").attr('src', el.attr('rel'));
            $('.ThumbnailWrapper img').removeClass('ActiveThumbnail')
            el.addClass('ActiveThumbnail')
        }

        $(window).on('load', function () {
            $('.Thumbnail').first().click()
        });
    </script>
@endsection
