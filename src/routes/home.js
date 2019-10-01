import $ from 'jquery';
window.jQuery = $;

export default {
  init() {
    $('#menu-primary-menu > li:first-child > a').click(e => {
      e.preventDefault();
      $('body, html').animate({
        scrollTop: $('.module-advantage').offset().top - 40
      });
    });
    $('#menu-primary-menu .sub-menu a').attr('target', '_blank');
    $('#menu-primary-menu > li:nth-child(2) > a').click(e => {
      e.preventDefault();
      $('body, html').animate({
        scrollTop: $('.module-events').offset().top - 40
      });
    });
    $('#menu-primary-menu > li:nth-child(3) > a').click(e => {
      e.preventDefault();
      $('body, html').animate({
        scrollTop: $('.module-imagecta').offset().top - 40
      });
    });
  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS
  },
};
