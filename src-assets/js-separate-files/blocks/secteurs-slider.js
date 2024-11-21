jQuery(function ($) {
  const swiperOptions = {
    spaceBetween: 1,
    slidesPerView: "auto",
    centeredSlides: true,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    autoplay: {
      delay: 2000, // Intervalle de 3 secondes entre les slides
      disableOnInteraction: false, // Ne pas désactiver l'autoplay après une interaction utilisateur
    },
  };

  var mediaQuery992px = window.matchMedia("(min-width: 992px)");

  if (mediaQuery992px.matches) {
    var swiperSlides = document.querySelectorAll(".swiper-slide");

    swiperSlides.forEach(function (slide) {
      slide.addEventListener("mouseenter", function () {
        swiperSlides.forEach(function (slide) {
          slide.classList.remove("active");
        });
        slide.classList.add("active");
      });
    });
  } else {
    var swiper = new Swiper(".swiper-secteurs", swiperOptions);
  }
});

//# sourceMappingURL=secteurs-slider.js.map
