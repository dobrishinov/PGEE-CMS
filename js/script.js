$(document).ready(function() {

  // Hamburger menu icon
  $('.hamburger').on('click', function() {
    $(this).toggleClass('check');
    $('#site-head>nav').toggle(400);
  });

  // Scroll icon
  $('#scroll-icon span').on('click', function() {
    $("html, body").animate({scrollTop: $(window).height() + 'px'}, 1000);
  });

  // News appearance effect
  if ($(window).width() >= 768) {
    $(document).on('scroll', function () {
      if ($(document).scrollTop() > $('.news-wrap').offset().top/2
          && $('.news').hasClass('hidden')) {
        $('.news').removeClass('hidden');
      }
    });
  }
  else {
    $('.news').removeClass('hidden');
  }

  // Partner appearance effect
  if ($(window).width() >= 768) {
    $(document).on('scroll', function () {
      if ($(document).scrollTop() > $('.partners-wrap').offset().top/1.5
          && $('.partner').hasClass('hidden')) {
        $('.partner').removeClass('hidden');
      }
    });
  }
  else {
    $('.partner').removeClass('hidden');
  }

}); 
