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

    if($(window).width() <= 1200){
        Consoles()
    }

    if($('.Properties .PropertiesFilter button').length != 0){
        $('.Properties .PropertiesFilter button').first().click()
    }

    $('.ImportantPopUp').show()

    if($('.PopUp').length != 0){
        setTimeout(function (){
            if($('.PopUp').length != 0){
                $('.PopUp').show()
                setTimeout(function (){
                    $('.PopUp').attr('class','PopUp animate__animated animate__fadeOutDown')
                },10000)
            }
        },3000)
    }

    $('.PreloaderInner').addClass('animate__fadeOutDown')

    PreventBrowsing()
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
                    slidesToScroll: 2,
                    speed: 500,
                    autoplaySpeed: 3000
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


function PreventBrowsing(){
    if($('.ImportantPopUp').length != 0){
        lenis.stop()
        $('body,html').css('overflow','hidden')
    }
}

function PreviewThisImage(el){
    var FullImageSrc = el.find('a').attr('href');
    $('.ImgPev img').attr('src',FullImageSrc)
    $('.ImgPev').show()
}

function Consoles(){
    $('.SideMenuDiv ul').html($('.HeaderTabs ul').html())
    $('.SideMenuDiv ul li ul').remove()
    $('.SideMenuDiv ul li i').remove()
    $('.HeaderTabs ul').remove()
    $('.PCHeaderTab').remove()
}

function GetProperties(el) {
    var SelectedCategoryID = '';
    if (el.attr('rel') && el.attr('rel').length !== 0) {
        SelectedCategoryID = el.attr('rel');
    }
    var TakeAmount = 8;
    var URL = Asset+"properties/json?take=" + TakeAmount + '&category=' + SelectedCategoryID;
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
