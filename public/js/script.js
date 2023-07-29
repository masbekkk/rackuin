var $jq = jQuery.noConflict();
$jq(document).ready(function () {
    $jq(window).scrollTop(0);
    $jq('.slider').slick({
        // dots: true,
        infinite: true,
        speed: 300,
        slidesToShow: 5,
        slidesToScroll: 1,
        arrows: false,
        swipeToSlide: true,
        responsive: [
            {
                breakpoint: 1440,
                settings: {
                    centerMode: true,
                    slidesToShow: 4,
                    slidesToScroll: 1,
                    infinite: true,
                    // dots: true
                }
            },
            {
                breakpoint: 1024,
                settings: {
                    centerMode: true,
                    arrows: false,
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    infinite: true,
                    // dots: true
                }
            },
            {
                breakpoint: 768,
                settings: {
                    centerMode: true,
                    arrows: false,
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 440,
                settings: {
                    centerMode: true,
                    arrows: false,
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });
});

function scrollId(id) {
    $('html, body').animate({
        scrollTop: $(id).offset().top - $('nav').height() // Means Less header height
    },220);
}

function addBoxShadow(id) {
    $('html, body').animate({
        scrollTop: $(id).offset().top - $('nav').height() // Means Less header height
    },220);
}

function addBoxShadow(id) {
    $('html, body').animate({
        scrollTop: $(id).offset().top - $('nav').height() // Means Less header height
    },220);
}