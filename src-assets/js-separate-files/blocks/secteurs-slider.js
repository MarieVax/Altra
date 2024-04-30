jQuery(function ($) {
  const swiperOptions = {
    slidesPerView: "auto",
    spaceBetween: 16,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  };
  //var swiper = new Swiper(".swiper-secteurs", swiperOptions);

  // Sélectionnez tous les éléments .swiper-slide
  var swiperSlides = document.querySelectorAll(".swiper-slide");

  // Ajoutez un écouteur d'événements à chaque élément .swiper-slide
  swiperSlides.forEach(function (slide) {
    slide.addEventListener("mouseenter", function () {
      // Supprimez la classe active de tous les éléments .swiper-slide
      swiperSlides.forEach(function (slide) {
        slide.classList.remove("active");
      });
      // Ajoutez la classe active à l'élément survolé
      slide.classList.add("active");
    });
  });
});

//# sourceMappingURL=secteurs-slider.js.map
