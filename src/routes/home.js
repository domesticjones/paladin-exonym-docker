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
  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS
  },
};
