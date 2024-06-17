jQuery(function ($) {
  const swiperOptions = {
    spaceBetween: 1,
    slidesPerView: "auto",
    centeredSlides: true,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  };

  var mediaQuery992px = window.matchMedia("(max-width: 992px)");

  if (mediaQuery992px.matches) {
    var swiperServices = new Swiper(".swiper-services", swiperOptions);
  }
});

//# sourceMappingURL=secteurs-slider.js.map
