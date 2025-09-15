@extends('layouts.app')
@section('content')

    <section class="Banner">
        <div class="BannerSlider">

            @foreach($sliders as $key => $slider)
                <div class="BannerSliderItem">
                    <img class="setsrc"
                         rel="{{ $slider->picture->thumbnail ?? '' }}">
                    <div class="container">
                        <div class="BannerSliderItemDiv animate__animated animate__fadeInUp">
                            <h1 class="animate__animated animate__fadeInDown animate__delay-1s"> {{ $slider->title ?? '' }} </h1>
                            <p>
                                {{ $slider->sub_title ?? '' }}
                            </p>
                            <button type="button" onclick="$(this).find('a')[0].click()">
                                <a class="d-none" href="{{ $slider->url ?? '' }}"></a>
                                Discover
                                <div class="setbg" rel="{{ asset('') }}RRR360/Requirements/IMG/Discover.png"></div>
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

        <div class="BannerArrows">
            <button type="button" onclick="$('.BannerSlider .slick-prev')[0].click()">
                <div class="setbg" rel="{{ asset('') }}RRR360/Requirements/IMG/Arrow.png"></div>
            </button>
            <button type="button" onclick="$('.BannerSlider .slick-next')[0].click()">
                <div class="setbg" rel="{{ asset('') }}RRR360/Requirements/IMG/Arrow.png"></div>
            </button>
        </div>
    </section>

    <section class="Properties">
        <div class="container">
            <div class="PropertiesFilter">
                <button type="button" onclick="GetProperties($(this))"   >
                    Random
                </button>
                @foreach($categories as $key => $category)
                    <button type="button" rel="{{$category->id ?? ''}}" onclick="GetProperties($(this))"
                            rel="{{ $category->id ?? '' }}">
                        {{ $category->title ?? '' }}
                    </button>
                @endforeach
            </div>


            <div class="PropertiesGH"></div>

            <button type="button" class="MorePropertiesBtn" onclick="$(this).find('a')[0].click()">
                <a class="d-none" href="{{ route('properties.index') }}"></a>
                More Properties
                <i class="fa fa-angle-right"></i>
            </button>
        </div>
    </section>

    <section class="About">
        <div class="container">
            <div class="AboutInner">
                <div class="AboutDiv">
                    <h1>
                        About
                        <u>
                            <div class="setbg" rel="{{ asset('') }}RRR360/Requirements/IMG/AboutBG.png"></div>
                            RRR 360
                        </u>
                    </h1>
                    <label>{{ $GlobalInfo->about_title ?? '' }}</label>
                    <p>
                        {{ $GlobalInfo->about_description ?? '' }}
                    </p>
                    <button type="button" onclick="$(this).find('a')[0].click()">
                        <a class="d-none" href="{{ route('about.index') }}"></a>
                        Read More
                        <div class="setbg" rel="{{ asset('') }}RRR360/Requirements/IMG/Discover.png"></div>
                    </button>
                </div>
                <div class="AboutArt" onclick="PlayVid($(this))">
                    <a href="{{ $GlobalInfo->about_video->url ?? '' }}" class="d-none VidSrc"></a>
                    <i class="fa fa-play animate__animated animate__zoomIn"></i>
                    <img class="setsrc" rel="{{ $GlobalInfo->about_photo->url ?? '' }}">
                </div>
                <div class="AboutBGParent">
                    <div class="setbg AboutBG" rel="{{ asset('') }}RRR360/Requirements/IMG/AboutBG.png"></div>
                </div>
            </div>
        </div>
    </section>

    <section class="FAQ">
        <div class="FAQHeader">
            <h1>Frequently Asked Questions</h1>
            <p>
                {{ $GlobalInfo->faq ?? '' }}
            </p>
        </div>

        @foreach($faqs as $key => $faq)
            <!-- FAQ {{ $faq->id ?? '' }} -->
            <div class="FAQItem" onclick="ExpandFAQ($(this))">
                <div class="container">
                    <div class="FAQItemInner">
                        <h1>{{ $faq->title ?? '' }}</h1>
                        <p class="animate__animated animate__fadeInDown">
                            {{ $faq->description ?? '' }}
                        </p>
                        <i class="fa fa-angle-down"></i>
                    </div>
                </div>
            </div>
        @endforeach
    </section>

    <section class="Gallery">
        @foreach($galleries as $key => $gallery)
            <div class="GalleryItem" onclick="PreviewThisImage($(this))">
                <a href="{{ $gallery->photo->url ?? '' }}" class="d-none"></a>
                <div class="setbg" rel="{{ $gallery->photo->thumbnail ?? '' }}"></div>
            </div>
        @endforeach
    </section>
@endsection
@section('scripts')
    @parent
    <script>
        const Asset = "{{asset("")}}";

        function GetProperties(el) {
            var SelectedCategoryID = '';
            if (el.attr('rel') && el.attr('rel').length !== 0) {
                SelectedCategoryID = el.attr('rel');
            }

            var TakeAmount = 8;
            var URL = "{{asset('')}}properties/json?take=" + TakeAmount + '&category=' + SelectedCategoryID;

            $('.PropertiesFilter button').removeClass('ActivePropertiesFilter')
            el.addClass('ActivePropertiesFilter')

            $.ajax({
                url: URL,
                type: "GET",
                dataType: "json",
                success: function (response) {
                    console.log(response);
                    $('.PropertiesGH').html('')
                    $.each(response, function (index, property) {
                        var PropertyImage = (property.media && property.media[0] && property.media[0].thumbnail)
                            ? property.media[0].thumbnail
                            : Asset + 'RRR360/Requirements/IMG/IMGRF.jpg';

                        var ItemHTML = '<div class="PropertyItem PropertyItem' + property.id + ' animate__animated animate__zoomIn" onclick="$(this).find(\'a\')[0].click()">' +
                            '<h6>' +
                            '<div class="setbg" style="background-image: url(' + Asset + 'RRR360/Requirements/IMG/IMGs.png)"></div>' +
                             property.photos.length +' </h6>' +
                            '<a href="'+Asset+'properties/'+property.id+'" class="d-none"></a>' +
                            '<img class="PropertyItemThumb" src="'+ property.media[0].thumbnail +'">' +
                            '<div class="PropertyItemDetails">' +
                            '<h4>'+property.title_en+'</h4>' +
                            '<label><i class="fa fa-map-marker-alt"></i>'+property.location_en+'</label>' +
                            '<h5></h5>' +
                            '<button type="button">' +
                            'Explore' +
                            '<div class="setbg" style="background-image: url(' + Asset + 'RRR360/Requirements/IMG/Discover.png)"></div>' +
                            ' </button>' +
                            '</div>' +
                            '</div>';

                        $('.PropertiesGH').append(ItemHTML)

                        $.each(property.specifications, function (pr, specification) {
                            console.log(specification)
                            $('.PropertyItem' + property.id + ' h5').append('<u>'+specification.title_en+'</u>')
                        })


                    });
                },
                error: function (xhr, status, error) {
                    console.error("Error fetching properties:", error);
                }
            });
        }
    </script>
@endsection
