@extends('layouts.app')
@section('content')

    <section class="Banner">
        <div class="BannerSlider">

            @foreach($sliders as $key => $slider)
                <div class="BannerSliderItem">
                    <img class="setsrc"
                         rel="{{ $slider->picture->thumbnail ?? '' }}"
                         alt="{{ $GlobalInfo->title ?? '' }} - {{ $GlobalInfo->description ?? '' }}">
                    <div class="container">
                        <div class="BannerSliderItemDiv animate__animated animate__fadeInUp">
                            <h1 class="animate__animated animate__fadeInDown animate__delay-1s"> {{ $slider->title ?? '' }} </h1>
                            <p>
                                {{ $slider->sub_title ?? '' }}
                            </p>
                            <button type="button" onclick="$(this).find('a')[0].click()">
                                <a class="d-none" href="{{ $slider->url ?? '' }}" target="_blank"></a>
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
                    <img class="setsrc" rel="{{ $GlobalInfo->about_photo->url ?? '' }}"
                         alt="{{ $GlobalInfo->title ?? '' }} - {{ $GlobalInfo->description ?? '' }}">
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
        if($('.FAQItem').length != 0){
            $('.FAQItem').first().addClass('OpenedFAQItem')
        }
    </script>
@endsection
