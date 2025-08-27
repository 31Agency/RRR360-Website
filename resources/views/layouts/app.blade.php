<!DOCTYPE html>
<html translate="no">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="{{ $GlobalInfo->title ?? '' }}">
    {{-- Favicon --}}
    <link rel="icon" type="image/x-icon" href="{{ $GlobalInfo->favicon->thumbnail ?? '' }}">
    <link href="{{ $GlobalInfo->favicon->thumbnail ?? '' }}" rel="icon">
    <link href="{{ $GlobalInfo->favicon->thumbnail ?? '' }}" rel="apple-touch-icon">
    <title> {{ $GlobalInfo->title ?? '' }} </title>
    <meta content="{{ $GlobalInfo->title ?? '' }}" property="og:title"/>
    <meta name="keywords"
          content="{{ $GlobalInfo->keywords ?? '' }} - {{ $info->about ?? '' }} - {{ $GlobalInfo->vison ?? '' }}">
    <meta name="description" content="{{ $GlobalInfo->about ?? '' }} - {{ $GlobalInfo->vision ?? '' }}">
    <meta name="google" content="notranslate">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,100..900;1,100..900&display=swap"
          rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('') }}RRR360/Requirements/CSS/bootstrap.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('') }}RRR360/Requirements/CSS/slick.css">
    <link rel="stylesheet" href="{{ asset('') }}RRR360/Requirements/CSS/animate.min.css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('') }}RRR360/Requirements/CSS/style.css">
    @yield('styles')
</head>
<body>
<header>
    <div class="container">
        <div class="HeaderInner">
            <div class="HeaderLogo" onclick="$(this).find('a')[0].click()">
                <a class="d-none" href="{{ route('home') }}"></a>
                <img src="{{ asset('') }}RRR360/Requirements/IMG/Logo.png">
            </div>

            <div class="HeaderTabs">
                <ul>
                    <li onclick="$(this).find('a')[0].click()">
                        <a class="d-none" href="{{ route('home') }}"></a>
                        Home
                    </li>
                    <li onclick="$(this).find('a')[0].click()">
{{--                        <a class="d-none" href="{{ route('properties.index') }}"></a>--}}
                        Properties
                        <i class="fa fa-angle-down"></i>
                        <ul class="SubTaB animate__animated animate__fadeInDown">
                            @foreach($GlobalCategories as $key => $category)
                                <li onclick="$(this).find('a')[0].click()">
                                    <a class="d-none" href="{{ route('properties.index') }}?category={{ $category->id ?? '' }}"></a>
                                    {{ $category->title ?? '' }}
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    <li onclick="$(this).find('a')[0].click()">
                        <a class="d-none" href="{{ route('about.index') }}"></a>
                        About
                    </li>
                    <li onclick="$(this).find('a')[0].click()">
                        <a class="d-none" href="{{ route('contact.index') }}"></a>
                        Contact
                    </li>
                </ul>
                <div class="HeaderBtns">
                    <button type="button" onclick="$(this).find('a')[0].click()">
                        <a target="_blank" class="d-none" href="https://wa.me/{{ $GlobalInfo->phone ?? '' }}"></a>
                        <i class="fab fa-whatsapp"></i>
                        Let's Chat
                    </button>
                </div>
            </div>
        </div>
    </div>
</header>

<main>
    @yield('content')
</main>

<footer>
    <section class="SubFooter">
        <div class="container">
            <div class="SubFooterInner">
                @if(session('message'))
                    <div class="row mb-2">
                        <div class="col-lg-12">
                            <div class="alert alert-success" role="alert">{{ session('message') }}</div>
                        </div>
                    </div>
                @endif
                @if($errors->count() > 0)
                    <div class="alert alert-danger">
                        <ul class="list-unstyled">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route("subscribers.store") }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <h2>Subscribe / Contact Us</h2>

                    <input type="text" id="name" name="name" placeholder="Full Name" required>

                    <input type="email" id="email" name="email" placeholder="Email" required>

                    <input type="tel" id="mobile" name="phone" placeholder="Mobile Number" required>

                    <textarea id="message" name="message" rows="4" placeholder="Your Message" required></textarea>

                    <button type="submit">Submit</button>
                </form>

                {!! $GlobalInfo->map ?? '' !!}
            </div>
        </div>
    </section>

    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-sm-12">
                <div class="FooterSection">
                    <h3> Our Mission & Values </h3>
                    <p>
                        {{ $GlobalInfo->vision ?? '' }}
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-12">
                <div class="FooterSection">
                    <h3> Contact </h3>
                    <label>
                        <i class="fa fa-phone"></i>
                        {{ $GlobalInfo->phone ?? '' }}
                    </label>
                    <label>
                        <i class="fa fa-envelope"></i>
                        {{ $GlobalInfo->email ?? '' }}
                    </label>
                    <label>
                        <i class="fa fa-map-marked-alt"></i>
                        {{ $GlobalInfo->address ?? '' }}
                    </label>
                </div>
            </div>
            <div class="col-lg-3 col-sm-12">
                <div class="FooterSection">
                    <h3> Quick Links </h3>
                    <ul>
                        <li onclick="$(this).find('a')[0].click()">
                            <a class="d-none" href="{{ route('home') }}"></a>
                            Home
                        </li>
                        <li onclick="$(this).find('a')[0].click()">
                            <a class="d-none" href="{{ route('about.index') }}"></a>
                            About
                        </li>
                        <li onclick="$(this).find('a')[0].click()">
                            <a class="d-none" href="{{ route('properties.index') }}"></a>
                            Properties
                        </li>
                        <li onclick="$(this).find('a')[0].click()">
                            <a class="d-none" href="{{ route('contact.index') }}"></a>
                            Contact
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-sm-12">
                <div class="FooterSection">
                    <h3> Feeds </h3>
                    <div class="FeedsGH">
                        @foreach($GlobalFeedLinks as $key => $feed_link)
                            <div class="FeedsItem" onclick="$(this).find('a')[0].click()">
                                <a href="{{ $feed_link->title ?? '' }}" target="_blank" class="d-none"></a>
                                <div class="setbg" rel="{{ $feed_link->photo->thumbnail ?? '' }}"></div>
                                <i class="fab fa-instagram animate__animated animate__flipInX"></i>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="CopyRights">
                    <p>
                        <a href="#" target="_blank" class="d-none"></a>
                        All copyrights reserved
                        <img class="setsrc" rel="{{ asset('') }}RRR360/Requirements/IMG/TECH.png"
                             onclick="$(this).parent().find('a')[0].click()">
                        {{ date('Y') }}©
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>

<div class="PopUp animate__animated animate__fadeInUp">
    <u onclick="$('.PopUp').attr('class','PopUp animate__animated animate__fadeOutDown')">
        <i class="fa fa-times-circle"></i>
    </u>
    <div class="PopUpArt setbg" rel="{{ asset('') }}RRR360/Requirements/IMG/Support.jpg"></div>
    <h4 class="animate__animated animate__fadeInDown animate__delay-1s"> Hello 👋</h4>
    <label> This is Sausan </label>
    <p>
        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
        standard dummy text ever since the 1500s.
    </p>
    <button type="button">
        <i class="fab fa-whatsapp"></i>
        Chat With Sausan
    </button>
</div>

<div class="ScrollerBtn animate__animated animate__flipInX">
    <button type="button" onclick="ScrollBackUp()">
        <div class="setbg" rel="{{ asset('') }}RRR360/Requirements/IMG/Arrow.png"></div>
    </button>
</div>

<div class="VideoPlayer">
    <div class="VideoPlayerInner">
        <div class="VideoPlayerFade" onclick="$('.VideoPlayer').fadeOut(600)"></div>
        <div class="VideoPlayerDiv animate__animated animate__zoomIn">
            <video controls loop playsinline autoplay></video>
        </div>
    </div>
</div>

<div class="ScrollIndicatorAmount"></div>

<div class="Preloader">
    <div class="PreloaderInner animate__animated">
        <div class="PreloaderDiv">
            <div class="PreloaderLoader"></div>
            <img src="{{ asset('') }}RRR360/Requirements/IMG/AboutBG.png">
        </div>
    </div>
</div>

<script src="{{ asset('') }}RRR360/Requirements/JS/bootstrap.min.js" crossorigin="anonymous"></script>
<script src="{{ asset('') }}RRR360/Requirements/JS/jquery-3.6.0.min.js"></script>
<script src="{{ asset('') }}RRR360/Requirements/JS/slick.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="https://unpkg.com/lenis@1.3.4/dist/lenis.min.js"></script>
<script src="{{ asset('') }}RRR360/Requirements/JS/javascript.js"></script>
@yield('scripts')
</body>
</html>
