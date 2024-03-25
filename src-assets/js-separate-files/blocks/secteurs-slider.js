jQuery(document).ready(function ($) {
  const swiperOptions = {
    slidesPerView: "auto",
    centeredSlides: true,
    spaceBetween: 50,
    //allowTouchMove: false,
    loop: true,
  };
  var swiper = new Swiper(".swiper--secteurs", swiperOptions);
});
