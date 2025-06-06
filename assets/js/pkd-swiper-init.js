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
      speed : 900,
    });
  }
});
