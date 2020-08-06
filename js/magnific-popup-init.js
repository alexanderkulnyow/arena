jQuery(document).ready(function ($) {
    $("figure").magnificPopup({
        delegate: 'a',
        type: 'image',
        tLoading: 'Loading image #%curr%...',
        mainClass: 'mfp-img-mobile',
        gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
        },
        image: {
            tError: '<a href="%url%">Невозможно загрузить изображение #%curr%</a>.',
            titleSrc: function (item) {

            }
        }
    });
});
