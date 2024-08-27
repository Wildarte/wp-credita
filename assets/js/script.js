document.addEventListener('DOMContentLoaded', () => {

    const btn_menu = document.querySelector('.btn_menu');
    const btn_close_menu = document.querySelector('.btn_close_menu');
    const nav_menu = document.querySelector('nav.menu');
    const over_page = document.querySelector('.over_page');
    
    btn_menu.addEventListener('click', () => {

        if(nav_menu.classList.contains('open_nav_menu')){
            over_page.classList.remove('open_nav_menu');
            nav_menu.classList.remove('open_nav_menu');
        }else{
            over_page.classList.add('open_nav_menu');
            setTimeout(function(){
                nav_menu.classList.add('open_nav_menu');
            },115);
        }

    });

    btn_close_menu.addEventListener('click', () => {

        nav_menu.classList.remove('open_nav_menu');
        setTimeout(function(){
            over_page.classList.remove('open_nav_menu');
        },115);

    });

    over_page.addEventListener('click', () => {

        nav_menu.classList.remove('open_nav_menu');
        setTimeout(function(){
            over_page.classList.remove('open_nav_menu');
        },115);

    });


});

$(document).ready(function(){
    
    $('.gallery_img').owlCarousel({
        loop:true,
        margin:10,
        nav:false,
        responsive:{
            0:{
                items:2
            },
            600:{
                items:3
            },
            1000:{
                items:4
            }
        }
    });

    const palco_img = document.querySelector('.palco_img');
    const gallery_img = document.querySelectorAll('.gallery_img img');

    if(palco_img){
        gallery_img.forEach((item, index) => {

            item.addEventListener('click', () => {

                let src_img = item.getAttribute('src');
                palco_img.querySelector('img').setAttribute('src', src_img);

            });

        });
    }

})