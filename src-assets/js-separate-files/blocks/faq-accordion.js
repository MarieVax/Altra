jQuery(document).ready(function($) {

  var initfaqaccordionBlock = function($block) {
    if (!$block) return;

    var $allTitlesLinkFaq = $block.find('.c-faq-accordion__subtitle > a');
    var $allPanelsFaq = $block.find('.c-faq-accordion__text');
    var $allTitlesFaq = $block.find('.c-faq-accordion__subtitle');

    $allPanelsFaq.not('.c-faq-accordion__text--active').hide();

    $allTitlesLinkFaq.click(function(e) {
      e.preventDefault();

      var $thisFaq = $(this);
      var $titleFaq = $thisFaq.parent();
      var $targetFaq = $thisFaq.parent().next();

      if (!$targetFaq.hasClass('c-faq-accordion__text--active')) {
        $allPanelsFaq.removeClass('c-faq-accordion__text--active').slideUp();
        $allTitlesFaq.removeClass('c-faq-accordion__subtitle--active');
        $targetFaq.addClass('c-faq-accordion__text--active').slideDown();
        $titleFaq.addClass('c-faq-accordion__subtitle--active');
      } else {
        $allPanelsFaq.removeClass('c-faq-accordion__text--active').slideUp();
        $allTitlesFaq.removeClass('c-faq-accordion__subtitle--active');
      }
      return false;
    });
  };

  $('.block-faq-accordion').each(function() {
    initfaqaccordionBlock($(this));
  });

  if (window.acf) {
    window.acf.addAction('render_block_preview/type=faqaccordion', initfaqaccordionBlock);
  }
});
