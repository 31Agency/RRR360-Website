@extends('layouts.app')
@section('content')
    <div class="PropertyPage">
        <div class="container">
            <div class="PropertyIntroduction">
                <h1>
                    <u>{{ $property->ref_no ?? '' }}</u>
                    {{ $property->title ?? '' }}
                    <strong>
                        {{ $property->price ?? '' }}
                        JOD
                    </strong>
                </h1>

                <label>
                    <i class="fa fa-map-marker-alt"></i>
                    {{ $property->location ?? '' }}
                </label>

                <h5>
                    {{ $property->status->title  ?? '' }}
                </h5>
            </div>

            @php
                $photos = $property->photos->take(3); // first 3
                $totalPhotos = $property->photos->count();
            @endphp

            <div class="PropertyPageGallery">
                <div class="PropertyPageGalleryLeft">
                    @if(isset($photos[0]))
                        <div class="setbg" rel="{{ $photos[0]->url }}" onclick="openSlider(0)"></div>
                    @endif
                </div>
                <div class="PropertyPageGalleryRight">
                    @if(isset($photos[1]))
                        <div class="setbg" rel="{{ $photos[1]->url }}" onclick="openSlider(1)"></div>
                    @endif
                    @if(isset($photos[2]))
                        <div class="setbg" rel="{{ $photos[2]->url }}" onclick="openSlider(2)"></div>
                    @endif
                </div>

                @if($totalPhotos > 3)
                    <label id="openGallery" onclick="openSlider(3)" style="cursor:pointer;">
                        <div class="setbg" rel="{{asset("RRR360/Requirements/IMG/IMGs.png")}}"></div>
                        {{ $totalPhotos - 3 }} More
                    </label>
                @endif
            </div>

            <div id="photoSlider" class="slider-popup">
                <div class="slider-overlay" onclick="closeSlider()"></div>
                <div class="slider-content animate__animated animate__zoomIn">
                    <span class="close-btn" onclick="closeSlider()">&times;</span>
                    <div class="slider-images">
                        @foreach($property->photos as $photo)
                            <img src="{{ $photo->url }}" alt="{{ $property->title ?? '' }}" class="slider-image">
                        @endforeach
                    </div>
                    <button class="prev" onclick="changeSlide(-1)">&#10094;</button>
                    <button class="next" onclick="changeSlide(1)">&#10095;</button>
                </div>
            </div>

            <div class="MainSpecificationsGH">
                <div class="MainSpecificationsItem">
                    <label>Property Type</label>
                    <h5>{{ $property->category->title ?? '' }}</h5>
                </div>
                <div class="MainSpecificationsItem">
                    <label>Furnishing Type</label>
                    <h5>{{ $property->furnishing->title ?? '' }}</h5>
                </div>
                <div class="MainSpecificationsItem">
                    <label>Area Size</label>
                    <h5>
                        <div class="setbg" rel="{{asset("RRR360/Requirements/IMG/AreaIcon.png")}}"></div>
                        {{ $property->area ?? '' }}
                    </h5>
                </div>
                <div class="MainSpecificationsItem">
                    <label>Bedrooms</label>
                    <h5>
                        <div class="setbg" rel="{{asset("RRR360/Requirements/IMG/BedIcon.png")}}"></div>
                        {{ $property->bedrooms ?? '' }}
                    </h5>
                </div>
                <div class="MainSpecificationsItem">
                    <label>Bathrooms</label>
                    <h5>
                        <div class="setbg" rel="{{asset("RRR360/Requirements/IMG/ShowerIcon.png")}}"></div>
                        {{ $property->bathrooms ?? '' }}
                    </h5>
                </div>
                <div class="MainSpecificationsItem">
                    <label>Building Age</label>
                    <h5>{{ $property->building_age ?? '' }}</h5>
                </div>
            </div>

            <div class="SubSpecificationsGH">
                <div class="PropertyPageDescription">
                    <h4>Description</h4>
                    <div class="PropertyPageDescriptionDiv">
                        {!! $property->description ?? '' !!}
                    </div>
                </div>

                <div class="SingleSpecificationsParent">
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

                    @if(isset($sectionsGrouped['multiple']) && count($sectionsGrouped['multiple']) > 0)
                        <div class="Features">
                            <h3 class="FeaturesHeader">
                                Features
                            </h3>
                            <div class="FeaturesGH">
                                @foreach($sectionsGrouped['multiple'] ?? [] as $section)
                                    <div class="FeaturesItem">
                                        <h3 class="FeaturesItemHeader">
                                            {{ $section->title ?? '' }}
                                        </h3>

                                        @foreach($section->specifications as $specification)
                                            <label>
                                                <div class="setbg"
                                                     rel="{{asset("RRR360/Requirements/IMG/Checked.png")}}"></div>
                                                {{ $specification->title ?? '' }}
                                            </label>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
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
                                    <u>{{ $related->floor->title_en ?? '' }}</u>
                                    <u class="HasIcon">
                                        <img class="setsrc" rel="{{asset("")}}RRR360/Requirements/IMG/BedIcon.png">
                                        {{ $related->bedrooms ?? '' }}
                                    </u>
                                    <u class="HasIcon">
                                        <img class="setsrc" rel="{{asset("")}}RRR360/Requirements/IMG/ShowerIcon.png">
                                        {{ $related->bathrooms ?? '' }}
                                    </u>
                                    <u class="HasIcon">
                                        <img class="setsrc" rel="{{asset("")}}RRR360/Requirements/IMG/AreaIcon.png">
                                        {{ $related->area ?? '' }}
                                    </u>
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
    </div>
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
