jQuery( document ).ready(function($) {

  // Init in the backend
  var initfaqmasonryBlock = function( $block ) {
    $block.find('.js-masonry').masonry({
        itemSelector: '.c-faq-masonry__el',
        percentPosition: true
    });
  }

  // Init on the frontend
  $('.block-faq-accordion').each(function(){
    initfaqmasonryBlock( $(this) );
  });

  // Init in the backend
  if( window.acf ) {
    window.acf.addAction( 'render_block_preview/type=faqmasonry', initfaqmasonryBlock );
  }
});