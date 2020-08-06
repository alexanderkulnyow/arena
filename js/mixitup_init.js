jQuery(document).ready(function ($) {
    // микситап
    $(function () {
        let containerEl = document.querySelector('.menu__container');
        let mixer = mixitup(containerEl, {
            controls: {
                // toggleDefault: 'none'
            },
            animation: {
                duration: 250,
                // easing: 'ease-in-out'
            }
        });
    })
});
