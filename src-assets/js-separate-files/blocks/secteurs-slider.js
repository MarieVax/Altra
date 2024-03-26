jQuery(function($) {
  const swiperOptions = {
      slidesPerView: "auto",
      spaceBetween: 16,
      loop: true,
      centeredSlides: true,
      navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev"
        }
  };
  var swiper = new Swiper(".swiper-secteurs", swiperOptions);      
});