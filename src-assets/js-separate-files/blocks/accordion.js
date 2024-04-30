jQuery( document ).ready(function($) {

  // Init in the backend
  var initAccordionBlock = function( $block ) {
    if($block) {
      // Hide all accordions
      $block.find('.c-accordion__text:not(.c-accordion__text--active)').hide();
      var $allTitlesLink = $block.find('.c-accordion__subtitle > a');
    }

    $allTitlesLink.click(function(e) {
      e.preventDefault();
      var $this = $(this);
      var $title = $this.parent();
      var $target =  $this.parent().next();
      var $allPanels = $this.closest('.c-accordion').find('.c-accordion__text');
      var $allTitles = $this.closest('.c-accordion').find('.c-accordion__subtitle');

      if(!$target.hasClass('c-accordion__text--active')){
        $allPanels.removeClass('c-accordion__text--active').slideUp();
        $allTitles.removeClass('c-accordion__subtitle--active');
        $target.addClass('c-accordion__text--active').slideDown();
        $title.addClass('c-accordion__subtitle--active');
      }
      else {
        $allPanels.removeClass('c-accordion__text--active').slideUp();
        $allTitles.removeClass('c-accordion__subtitle--active');
      }
      return false;
    });
  }

  // Init on the frontend
  $('.block-accordion').each(function(){
    initAccordionBlock( $(this) );
  });

  // Init in the backend
  if( window.acf ) {
    window.acf.addAction( 'render_block_preview/type=accordion', initAccordionBlock );
  }
});
//# sourceMappingURL=accordion.js.map
