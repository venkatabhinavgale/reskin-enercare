"use strict";

jQuery(function ($) {
  // Mobile Menu
  $('.menu-toggle').click(function () {
    $('.search-toggle, .header-search').removeClass('active');
    $('.menu-toggle, .nav-menu').toggleClass('active');
  });
  $('.menu-item-has-children > .submenu-expand').click(function (e) {
    $(this).toggleClass('expanded');
    e.preventDefault();
  }); // Search toggle

  $('.search-toggle').click(function () {
    $('.menu-toggle, .nav-menu').removeClass('active');
    $('.search-toggle, .header-search').toggleClass('active');
    $('.site-header .search-field').focus();
  });
});
"use strict";

jQuery(function ($) {
  // Smooth Scroll
  function enercare_scroll(hash) {
    var target = null;

    try {
      target = $(hash);
    } catch (error) {
      // Perhaps worth adding some error logging here in the future.
      return false;
    }

    target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');

    if (target.length) {
      var top_offset = 0;

      if ($('.site-header').css('position') == 'fixed') {
        top_offset = $('.site-header').height();
      }

      if ($('body').hasClass('admin-bar')) {
        top_offset = top_offset + $('#wpadminbar').height();
      }

      $('html,body').animate({
        scrollTop: target.offset().top - top_offset
      }, 1000);
      return false;
    }
  } // -- Smooth scroll on pageload


  if (window.location.hash) {
    enercare_scroll(window.location.hash);
  } // -- Smooth scroll on click


  $('a[href*="#"]:not([href="#"]):not(.no-scroll)').click(function () {
    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {
      enercare_scroll(this.hash);
    }
  });
});