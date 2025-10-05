$(document).ready(function () {
    ScrollEvent()
    $('.ScrollerBtn').on('click', ScrollBackUp);
    Sliders()

    $(document).mouseup(function(e)
    {
        var container = $(".PropertiesFiltrationFieldOptions");

        // if the target of the click isn't the container nor a descendant of the container
        if (!container.is(e.target) && container.has(e.target).length === 0)
        {
            container.hide();
        }
    });
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
    var TakeAmount = 6;
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
            $.each(response.data, function (index, property) {
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
                    '<h7>'+property.category.title_en+'</h7>' +
                    '<h8>'+property.price+' JOD/'+property.price_per+'</h8>' +
                    '<h4>('+ property.ref_no +') '+property.title_en+'</h4>' +
                    '<label><i class="fa fa-map-marker-alt"></i>'+property.location_en+'</label>' +
                    '<h5></h5>' +
                    '<button type="button">' +
                    'Explore' +
                    '<div class="setbg" style="background-image: url(' + Asset + 'RRR360/Requirements/IMG/Discover.png)"></div>' +
                    ' </button>' +
                    '</div>' +
                    '</div>';

                $('.PropertiesGH').append(ItemHTML)

                if (property.floor != null) {
                    $('.PropertyItem' + property.id +' h5').append('<u>'+property.floor.title_en+'</u>')
                }

                if (property.bedrooms) {
                    $('.PropertyItem' + property.id + ' h5').append('<u class="HasIcon"><img src="' + Asset + 'RRR360/Requirements/IMG/BedIcon.png">'+property.bedrooms+'</u>')
                }

                if (property.bathrooms) {
                    $('.PropertyItem' + property.id + ' h5').append('<u class="HasIcon"><img src="' + Asset + 'RRR360/Requirements/IMG/ShowerIcon.png">'+property.bathrooms+'</u>')
                }

                if (property.area) {
                    $('.PropertyItem' + property.id + ' h5').append('<u class="HasIcon"><img src="' + Asset + 'RRR360/Requirements/IMG/AreaIcon.png">'+property.area+'</u>')
                }
            });
        },
        error: function (xhr, status, error) {
            console.error("Error fetching properties:", error);
        }
    });
}

function GetAllProperties(PageNumber) {
    // Gather filter arrays
    var SelectedCategoryID = [];
    $('#FltrPropertyType .FiltrationSelectgedChoice').each(function() {
        SelectedCategoryID.push($(this).attr('rel'));
    });

    var SelectedAreas = [];
    $('#FltrArea .FiltrationSelectgedChoice').each(function() {
        SelectedAreas.push($(this).attr('rel'));
    });

    var SelectedFurnishing = [];
    $('#FltrFurnishing .FiltrationSelectgedChoice').each(function() {
        SelectedFurnishing.push($(this).attr('rel'));
    });

    var BedRoomsAmount = $('#FltrBeedrooms .FiltrationSelectgedChoice').attr('rel');

    var MaxPrice = $('#PropertyMaxPrice').val();

    // Base URL
    var TakeAmount = 9;
    var URL = Asset + "properties/json?take=" + TakeAmount;

// Add params only if they exist
    if (SelectedCategoryID.length > 0) {
        SelectedCategoryID.forEach(function(id) {
            URL += "&category[]=" + encodeURIComponent(id);
        });
    }

    if (SelectedAreas.length > 0) {
        SelectedAreas.forEach(function(id) {
            URL += "&specifications[]=" + encodeURIComponent(id);
        });
    }

    if (SelectedFurnishing.length > 0) {
        SelectedFurnishing.forEach(function(id) {
            URL += "&furnishing[]=" + encodeURIComponent(id);
        });
    }

    if ($('#FltrBeedrooms .FiltrationSelectgedChoice').length != 0){
        URL += "&bedrooms=" + BedRoomsAmount;
    }

    if (MaxPrice && MaxPrice.trim() !== ""){
        URL += "&max_price=" + encodeURIComponent(MaxPrice);
    }


    if (PageNumber){
        URL += "&page=" + PageNumber;
    }

    // Build filter summary (for #FiltrationMap)
    var FilterSummary = [];

    if (SelectedCategoryID.length > 0) {
        $('#FltrPropertyType .FiltrationSelectgedChoice').each(function() {
            FilterSummary.push($(this).text());
        });
    }

    if (SelectedAreas.length > 0) {
        $('#FltrArea .FiltrationSelectgedChoice').each(function() {
            FilterSummary.push($(this).text());
        });
    }

    if (SelectedFurnishing.length > 0) {
        $('#FltrFurnishing .FiltrationSelectgedChoice').each(function() {
            FilterSummary.push($(this).text());
        });
    }

    if ($('#FltrBeedrooms .FiltrationSelectgedChoice').length != 0) {
        FilterSummary.push($('#FltrBeedrooms .FiltrationSelectgedChoice').text());
    }

    if (MaxPrice && MaxPrice.trim() !== "") {
        FilterSummary.push("Max Price: " + MaxPrice + " JOD");
    }

// Render the summary nicely
    if (FilterSummary.length > 0) {
        $('.FiltrationMap').html(
            FilterSummary.map(tag => `<span class="ActiveFilterTag">${tag}</span>`).join(' ')
        );
    } else {
        $('.FiltrationMap').html('');
    }


    // Perform AJAX
    $.ajax({
        url: URL,
        type: "GET",
        dataType: "json",
        success: function (response) {
            console.log(response.data)
            $('.PropertiesGH').html('');
            $('.PropertiesPagination').html('');
            if(response.data.length != 0){
                $.each(response.links, function (link, page) {
                    if (!isNaN(Number(page.label))) {
                        $('.PropertiesPagination').append('<button type="button" class="PaginationNumber'+page.label+'" onclick="SelectPagination('+page.label+')">'+page.label+'</button>')
                    }
                });

                $.each(response.data, function (index, property) {
                    var PropertyImage = (property.media && property.media[0] && property.media[0].thumbnail)
                        ? property.media[0].thumbnail
                        : Asset + 'RRR360/Requirements/IMG/IMGRF.jpg';

                    var ItemHTML = `
                    <div class="PropertyItem PropertyItem${property.id} animate__animated animate__zoomIn" onclick="$(this).find('a')[0].click()">
                        <h6>
                            <div class="setbg" style="background-image: url(${Asset}RRR360/Requirements/IMG/IMGs.png)"></div>
                            ${property.photos.length}
                        </h6>
                        <a href="${Asset}properties/${property.id}" class="d-none"></a>
                        <img class="PropertyItemThumb" src="${PropertyImage}">
                        <div class="PropertyItemDetails">
                            <h7>${property.category.title_en}</h7>
                            <h8>${property.price} JOD/${property.price_per}</h8>
                            <h4>(${property.ref_no}) ${property.title_en}</h4>
                            <label><i class="fa fa-map-marker-alt"></i>${property.location_en}</label>
                            <h5></h5>
                            <button type="button">
                                Explore
                                <div class="setbg" style="background-image: url(${Asset}RRR360/Requirements/IMG/Discover.png)"></div>
                            </button>
                        </div>
                    </div>`;

                    $('.PropertiesGH').append(ItemHTML);

                    if (property.floor != null) {
                        $(`.PropertyItem${property.id} h5`).append(`<u>${property.floor.title_en}</u>`);
                    }
                    if (property.bedrooms) {
                        $(`.PropertyItem${property.id} h5`).append(`<u class="HasIcon"><img src="${Asset}RRR360/Requirements/IMG/BedIcon.png">${property.bedrooms}</u>`);
                    }
                    if (property.bathrooms) {
                        $(`.PropertyItem${property.id} h5`).append(`<u class="HasIcon"><img src="${Asset}RRR360/Requirements/IMG/ShowerIcon.png">${property.bathrooms}</u>`);
                    }
                    if (property.area) {
                        $(`.PropertyItem${property.id} h5`).append(`<u class="HasIcon"><img src="${Asset}RRR360/Requirements/IMG/AreaIcon.png">${property.area}</u>`);
                    }
                });

                $('.PaginationNumber'+response.current_page).addClass('ActivePage')
            }else{
                $('.PropertiesGH').html('<div class="FiltrationRF">' +
                    '<div class="FiltrationRFDiv animate__animated animate__zoomIn">' +
                    '  <img src="'+Asset+'RRR360/Requirements/IMG/FiltrationRF.gif">' +
                    '<h4>No Results Found</h4>' +
                    '<p>We couldn’t find any properties matching your selected criteria. Please try adjusting your filters and search again.</p>'+
                '</div>' +
                    '</div>');
            }
        },
        error: function (xhr, status, error) {
            console.error("Error fetching properties:", error);
        }
    });
}
function ShowFiltrationOptions(el){
    var Target = el.parent().find('.PropertiesFiltrationFieldOptions')
    $('.PropertiesFiltrationFieldOptions').hide()
    Target.show()
}

function SelectThisFiltrationChoice(el){
    var Type = el.parent().attr('type');
    if(Type != 'multiple'){
        if(el.hasClass('FiltrationSelectgedChoice')){
            el.removeClass('FiltrationSelectgedChoice')
        }else{
            el.parent().find('.PropertiesFiltrationFieldOptionItem').removeClass('FiltrationSelectgedChoice')
            el.addClass('FiltrationSelectgedChoice')
        }
        el.parent().fadeOut(600)
   }else{
        if(el.hasClass('FiltrationSelectgedChoice')){
            el.removeClass('FiltrationSelectgedChoice')
        }else{
            el.addClass('FiltrationSelectgedChoice')
        }
    }
}

// Debounce utility: waits until user stops typing for a certain time (e.g., 600ms)
function debounce(func, delay) {
    let timer;
    return function(...args) {
        clearTimeout(timer);
        timer = setTimeout(() => func.apply(this, args), delay);
    };
}

const debouncedMaxPriceChange = debounce(function(el) {
    GetAllProperties();
}, 600); // 600ms after user stops typing

function SelectPagination(Number){
    GetAllProperties(Number)
    ScrollBackUp()
}

let slideIndex = 0;

function openSlider(index) {
    slideIndex = index;
    $('#photoSlider').css('display','flex');
    showSlide(slideIndex);
}

function closeSlider() {
    $('#photoSlider').fadeOut();
}

function changeSlide(n) {
    showSlide(slideIndex += n);
}

function showSlide(n) {
    const slides = $('.slider-image');
    if (n >= slides.length) slideIndex = 0;
    if (n < 0) slideIndex = slides.length - 1;
    slides.hide();
    slides.eq(slideIndex).show();
}
