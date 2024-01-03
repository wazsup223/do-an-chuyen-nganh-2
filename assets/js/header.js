window.addEventListener('DOMContentLoaded', function(){
    Menu_sticky();
    Slider();
})

function Menu_sticky(){
    const $ = document.querySelector.bind(document);
    const menu_header = $('.header-menu');
    const top = menu_header.offsetTop;
    window.addEventListener('scroll', function(){
        if(document.body.scrollTop > top || document.documentElement.scrollTop > top){
            menu_header.style.setProperty('--w', '117vw');
        }else{
            menu_header.style.setProperty('--w', '0px');
        }
    })
}

function Slider(){
    const slider_imgs = [
        'assets/images/slider/slider-1.png',
        'assets/images/slider/slider-2.png',
        'assets/images/slider/slider-3.png',
        'assets/images/slider/slider-4.png',
        'assets/images/slider/slider-5.png',
        'assets/images/slider/slider-6.png',
        'assets/images/slider/slider-7.png',
    ];
    const slider_element = slider_imgs.map(function(item) {
        return `
            <li class="glide__slide">
                <div class="slide" style="background-image: url(${item})"></div>
            </li>
        `;
    })
    document.querySelector('.glide__slides').innerHTML = slider_element.join('');

    let slider_bullets = '';
    for (let index = 0; index < slider_imgs.length; index++) {
        slider_bullets += `<button class="glide__bullet" data-glide-dir="=${index}"></button>`;
    }
    document.querySelector('.glide__bullets').innerHTML = slider_bullets;

    const glide = new Glide('.glide', {
        perView: 1,
        perSwipe: '|',
        dragThreshold: 1,
        swipeThreshold: 10,
        animationDuration: 400,
        rewindDuration: 500,
        autoplay: 4000
    }).mount();
}