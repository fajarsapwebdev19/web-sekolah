// cursor untuk slider-hero
$(document).ready(function() {

    $("#slider-hero").owlCarousel({
        loop: true,
        nav: true,
        items: 1,
        merge: true,
        smartSpeed: 1200,
        autoplay: true,
        autoplayTimeout: 10000,
        margin: 0,
        animatedIn: 'fadeIn',
        navText: [
            "<i class='fas fa-angle-left'><i>",
            "<i class='fas fa-angle-right'><i>"
        ],
        navContainer: "#slider-hero-nav",
    });
    // akhir cursor slider-hero

    $('#team-slider').owlCarousel({
        loop: true,
        nav: true,
        smartSpeed: 350,
        autoplay: true,
        autoplayTimeout: 10000,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 3
            }
        },
        navText: [
            "<i class='fas fa-angle-left'></i>",
            "<i class='fas fa-angle-right'></i>"
        ],
        navContainer: "slider-tools-3",
    });

    $('#du-slider').owlCarousel({
        loop: true,
        nav: true,
        smartSpeed: 350,
        autoplay: true,
        autoplayTimeout: 10000,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 3
            }
        },
        navText: [
            "<i class='fas fa-angle-left'></i>",
            "<i class='fas fa-angle-right'></i>"
        ],
        navContainer: "slider-tools-3",
    });

    // collapse hide on click navbar link
    $('.nav-link.auto-collapse').on('click', function(){
        $('.navbar-collapse').collapse('hide');
    });

    $('.nav-item.dropdown-toggle').on('click', function(){
        $('.navbar-collapse').collapse(0);
    });

    $('#alert').hide();

});

document.querySelectorAll('.video-container video').forEach(vid => {
    vid.onclick = () => {
        document.querySelector('.popup-video').style.display = 'block';
        document.querySelector('.popup-video video').src = vid.getAttribute('src');
    }

    document.querySelector('.popup-video span').onclick = () => {
        document.querySelector('.popup-video').style.display = 'none';
    }
})

document.querySelectorAll('.foto-section .foto img').forEach(vid => {
    vid.onclick = () => {
        document.querySelector('.popup-foto').style.display = 'block';
        document.querySelector('.popup-foto img').src = vid.getAttribute('src');
    }

    document.querySelector('.popup-foto span').onclick = () => {
        document.querySelector('.popup-foto').style.display = 'none';
    }
})

