jQuery( document ).ready(function($) {

  // Init in the backend
  var initImageSliderBlock = function( $block ) {
    var elem = $block.find('.js-image-slider')[0];
    if(elem) {
      new Swiper(elem, {
        loop: false,
        speed: 700,
        autoHeight: true,
        lazy: {
          checkInView: true,
          loadPrevNext: false,
          loadOnTransitionStart: false
        },
        pagination: {
          el: '.swiper-pagination',
          clickable: true
        },
        navigation: {
          nextEl: elem.nextElementSibling.nextElementSibling,
          prevEl: elem.nextElementSibling,
        },
        on: {
          init: function () {
            var sliderWraper = $(this.$el).parent();
            var prevArrowPrev = sliderWraper.find('.swiper-button-prev');
            var prevArrowNext = sliderWraper.find('.swiper-button-next');
            var imageHeight = sliderWraper.find('img').first().height();
    
            prevArrowPrev.css('top', imageHeight / 2 + 'px');
            prevArrowNext.css('top', imageHeight / 2 + 'px');
          },
          slideChange: function() {
            var sliderWraper = $(this.$el).parent();
            var prevArrowPrev = sliderWraper.find('.swiper-button-prev');
            var prevArrowNext = sliderWraper.find('.swiper-button-next');
            var imageHeight = $(sliderWraper.find('img')[this.activeIndex]).height();
    
            prevArrowPrev.css('top', imageHeight / 2 + 'px');
            prevArrowNext.css('top', imageHeight / 2 + 'px');
          }
        },
      });
    }
  }

  // Init on the frontend
  $('.js-image-slider-wrap').each(function(){
    initImageSliderBlock( $(this) );
  });

  // Initialize Before/After script in backend
  if( window.acf ) {
    window.acf.addAction( 'render_block_preview/type=image-slider', initImageSliderBlock );
  }
});
