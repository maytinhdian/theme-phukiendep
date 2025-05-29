/***
 * Khởi tạo Swiper cho WooCommerce Product Gallery - dùng npm
 */

document.addEventListener('DOMContentLoaded', function () {
    if(document.querySelector('#pkd-product-gallery')) {
        new Swiper('#pkd-product-gallery', {
            loop: true,
            slidesPerView: 1,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    }
});

