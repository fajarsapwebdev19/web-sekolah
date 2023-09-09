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

    $('#form-anggota').on('click', '#regis', function() 
    {
        var data = $('#form-anggota').serialize();

        $.ajax({
            url: 'process/registrasi-anggota.php',
            data: data,
            type: 'POST',
            success:function(response)
            {
                if(response == "Berhasil")
                {
                    $('.form-control').val(null);
                    $('.form-check-input').prop('checked', false);
                    $('#alert').addClass("alert-success text-left bg-success text-white").removeClass("alert-danger bg-danger");
                    $('.message').html("Berhasil Tambah Anggota Baru");
                    $("#alert").fadeTo(3000, 5000).slideUp(1200,function(){$("#alert").slideUp(600)});
                    
                    $(window).scrollTop(0);
                    
                    
                }else
                {
                    $('.form-control').val(null);
                    $('.form-check-input').prop('checked', false);
                    $('#alert').show();
                    $('#alert').addClass("alert-danger text-left bg-danger text-white").removeClass("alert-success bg-success");
                    $('.message').html("Silahkan Lengkapi Data Terlebih Dahulu");
                    $("#alert").fadeTo(3000, 5000).slideUp(1200,function(){$("#alert").slideUp(600)});

                    $(window).scrollTop(0);
                    
                    
                }
            }
        })
        
    })
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

