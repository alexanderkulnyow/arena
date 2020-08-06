//=include ../../../../env/node_modules/bootstrap/dist/js/bootstrap.js
// // mobile menu

let hamburger = document.getElementById("hamburger");
let mobileMEnu = document.getElementById("menu");


hamburger.addEventListener("click", function() {
    // Toggle class "is-active"
    hamburger.classList.toggle("is-active");
    // Do something else, like open/close menu
});
//
function mobileMenu() {
    let WWidht = window.innerWidth;
    if (WWidht <= 990) {
        mobileMEnu.classList.add("mobileMenu_hide");
    } else {
        mobileMEnu.classList.remove("mobileMenu_hide");
        mobileMEnu.classList.remove("mobileMenu_show");
    }
};
mobileMenu();
//
window.addEventListener(`resize`, event => {
    mobileMenu();
    // console.log(WWidht);
}, false);
//

hamburger.onclick = function () {
    if (hamburger.classList.contains('is-active')) {
        mobileMEnu.classList.add('mobileMenu_show')
        mobileMEnu.classList.remove('mobileMenu_hide')
    } else {
        mobileMEnu.classList.add('mobileMenu_hide')
        mobileMEnu.classList.remove('mobileMenu_show')
    }
};


//
// let eld = document.getElementsByClassName('menu-item');
// for(let i=0; i<eld.length; i++) {
//     eld[i].addEventListener("mouseenter", showSub, false);
//     eld[i].addEventListener("mouseleave", hideSub, false);
// }
// function showSub(e) {
//     if(this.children.length>1) {
//         this.children[1].classList.add('submenu_show');
//         this.children[1].classList.remove('submenu_hide');
//     } else {
//         return false;
//     }
// }
//
// function hideSub(e) {
//     if(this.children.length>1) {
//         this.children[1].classList.remove('submenu_show');
//         this.children[1].classList.add('submenu_hide');
//     } else {
//         return false;
//     }
// }


jQuery(document).ready(function ($) {

    // мягкий скрол на ссылках
    $("body").on("click", ".link__slow", function (event) {
        //отменяем стандартную обработку нажатия по ссылке
        event.preventDefault();
        //забираем идентификатор бока с атрибута href
        var id = $(this).attr('href'),
            //узнаем высоту от начала страницы до блока на который ссылается якорь
            top = $(id).offset().top;
        //анимируем переход на расстояние - top за 1500 мс
        $('body,html').animate({scrollTop: top}, 500);
    });
    //
    // $(document).ready(function(){
    //     $(window).scroll(function(){
    //         let sT =  $(window).scrollTop();
    //         $('.site__header').css({
    //             opacity: (sT < 201 ? 0 : (sT > 300 ? 1 : (sT - 200)/100))
    //         })
    //     });
    // });
});


