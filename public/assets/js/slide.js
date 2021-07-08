$(document).ready(function(){

    var slidePeserta = $('#slide-peserta')
    slidePeserta.owlCarousel({
        loop: true,
        autoplay: true,
        autoplayTimeout: 2000,
        autoplayHoverPause: false,
        responsiveClass: true,
        responsive: {
            0: {
                items:1,
                stagePadding: 15,
                margin: 15
            },
            540: {
                items:1,
                stagePadding: 15,
                margin: 15
            },
            720: {
                items:1,
                stagePadding: 70,
                margin: 35
            },
            960: {
                items:2,
                margin: 20
            }
        }
    })
})