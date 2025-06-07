document.addEventListener("DOMContentLoaded", function () {
  if (document.querySelector(".main-swiper")) {
    var swiper = new Swiper(".main-swiper", {
      slidesPerView: "auto",
      spaceBetween: 10,
      loop: true,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      },
      speed: 900,
    });
  }
});

document.addEventListener("DOMContentLoaded", function () {
  if (document.querySelector("#pkd-product-gallery")) {
    var swiper = new Swiper("#pkd-product-gallery", {
      spaceBetween: 10,
      loop: true,
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      speed: 900,
    });
  }
});
