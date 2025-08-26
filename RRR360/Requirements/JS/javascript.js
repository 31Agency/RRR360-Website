$(document).ready(function () {
    if($('.FAQItem').length != 0){
        $('.FAQItem').first().addClass('OpenedFAQItem')
    }

    ScrollEvent()
    $('.ScrollerBtn').on('click', ScrollBackUp);
    Sliders()
});

$(window).on('load',function (){
    SetSrc()
    SetBg()

    if($('.PopUp').length != 0){
        setTimeout(function (){
            $('.PopUp').show()

            setTimeout(function (){
                $('.PopUp').attr('class','PopUp animate__animated animate__fadeOutDown')
            },10000)
        },3000)
    }

    setTimeout(function (){
        $('.PreloaderInner').addClass('animate__fadeOutDown')
    },2500)

});

$(window).on('resize',function (){

});

function SetBg(){
    $('.setbg').each(function() {
        var el = $(this);
        var bg = el.attr('rel');
        el.css('background-image','url("'+bg+'")')
        el.removeAttr('rel')
    });
}

function SetSrc(){
    $('.setsrc').each(function() {
        var el = $(this);
        var bg = el.attr('rel');
        el.attr('src',bg)
        el.removeAttr('rel')
    });
}

function Sliders(){
    $('.BannerSlider').slick({
        dots: true,
        infinite: true,
        arrows: true,
        autoplay: true,
        speed: 700,
        slidesToShow: 1,
        slidesToScroll: 1,
        fade: true,
        cssEase: 'linear'
    });

    $('.BannerSlider .slick-dots li').html('<div></div>')

    $('.Gallery').slick({
        dots: false,
        infinite: true,
        arrows: false,
        autoplay: true,
        autoplaySpeed: 500,
        speed: 2000,
        slidesToShow: 6,
        slidesToScroll: 6,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 4
                }
            },
            {
                breakpoint: 800,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            }

        ]
    });
}

function ExpandFAQ(el){
    if(el.hasClass('OpenedFAQItem')){
        $('.FAQItem').removeClass('OpenedFAQItem')
    }else{
        $('.FAQItem').removeClass('OpenedFAQItem')
        el.addClass('OpenedFAQItem')
    }
}

window.ScrollEvent = function () {
    window.lenis = new Lenis({
        duration: 2.0,
        easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
        smooth: true,
    });

    function raf(time) {
        window.lenis.raf(time);
        var Scroll = window.lenis.scroll,
            dh = document.documentElement.scrollHeight,
            wh = window.innerHeight,
            value = (Scroll / (dh - wh)) * 100;

        $('.ScrollIndicatorAmount').width(value + '%');
        $('.BannerDiv').css('right', value + '%');

        if (Scroll > 500) {
            $('.ScrollerBtn').fadeIn(600);
            $('header').addClass('FixedHeader animate__animated animate__fadeInDown');
        } else {
            $('.ScrollerBtn').fadeOut(600);
            $('header').attr('class','');
        }

        requestAnimationFrame(raf);
    }

    requestAnimationFrame(raf);
};

function ScrollBackUp() {
    window.lenis.scrollTo(0, {duration: 1.5});
}

function PlayVid(el){
    var Src = el.find('.VidSrc').attr('href');
    $('.VideoPlayer video').attr('src',Src);
    $('.VideoPlayer').show()
}