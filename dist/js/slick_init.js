jQuery(document).ready(function ($) {
    let sliders_num = document.getElementById('slickbloc').children.length;
    let arena_slide_to_show;

    if (sliders_num > 4) {
        arena_slide_to_show = 4;
    } else {
        arena_slide_to_show = sliders_num;
    }

    console.log('arena_slide_to_show=' + arena_slide_to_show);
    console.log('sliders_num=' + sliders_num);

    $('.slickbloc').slick(

        {
            dots: false,
            arrows: true,
            infinite: false,
            slidesToShow: arena_slide_to_show,
            slidesToScroll: 1,
            responsive: [
                {
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: arena_slide_to_show
                    }
                },
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 3
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 420,
                    settings: {
                        slidesToShow: 1
                    }
                },
            ]
        }
    );
    //
    console.log('arena_slide_to_show=' + arena_slide_to_show);
    console.log('sliders_num=' + sliders_num);
})

//# sourceMappingURL=slick_init.js.map
