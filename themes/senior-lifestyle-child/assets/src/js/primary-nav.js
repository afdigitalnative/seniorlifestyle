(function($, window, document) {
  $('.mobile-nav-btn').on('click', function(e) {
    $('.main-navigation').toggleClass('active-mobile-nav');
  });

  $('.mobile-nav-header').on('click', function(e) {
    $('.main-navigation').toggleClass('active-mobile-nav');
  });
})(jQuery, window, document);