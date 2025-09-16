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
                                 alt="{{ $property->title ?? '' }} - {{ $property->description ?? '' }}">
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
                        <h5>
                            @foreach($property->specifications as $sub_key => $specification)
                                <u>{{ $specification->title ?? '' }}</u>
                            @endforeach
                        </h5>
                        <label>
                            <i class="fa fa-map-marker-alt"></i>
                            {{ $property->location ?? '' }}
                        </label>
                    </div>

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
                                    @foreach($related->specifications as $sub_key => $specification)
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
