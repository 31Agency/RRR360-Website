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
                <button class="ActivePropertiesFilter" type="button" onclick="ChooseThisFiltration($(this))" rel=".ddd">
                    Random
                </button>
                @foreach($categories as $key => $category)
                    <button type="button" onclick="ChooseThisFiltration($(this))" rel=".id{{ $category->id ?? '' }}">
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

@endsection
