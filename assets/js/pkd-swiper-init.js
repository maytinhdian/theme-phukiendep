/***
 * Khởi tạo Swiper cho WooCommerce Product Gallery - dùng npm
 */



document.addEventListener("DOMContentLoaded", function () {
  if (document.querySelector(".mySwiper")) {
    var swiper = new Swiper(".mySwiper", {
      effect: "fade",
      fadeEffect: {
        crossFade: true,
      },
      spaceBetween: 30,
      centeredSlides: true,
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      speed: 700,
    });
  }
});
