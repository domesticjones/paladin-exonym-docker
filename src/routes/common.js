import $ from 'jquery';
window.jQuery = $;
require('jquery-visible');
require('slick-carousel');

export default {
  init() {
  	// Wrap embedded objects and force them into 16:9
  	$('iframe, embed, video').not('.ignore-ratio').wrap('<div class="video-container" />');

  	// HEADER: Responsive Nav Toggle
  	$('#header-nav-toggle').click(e => {
      e.preventDefault();
  		const $this = $(e.currentTarget);
  		$this.toggleClass('is-active');
      $('#nav-mobile').toggleClass('is-active');
  	});

    // CONTACT: ScrollTo Link Capture
    $('a[href="#contact"]').click(e => {
      e.preventDefault();
      $('#nav-mobile, #header-nav-toggle').removeClass('is-active');
      $('html, body').animate({
        scrollTop: $('#contact').offset().top - 62
      }, 2000);
    });

    // HEADER: Add class on scroll
    $(window).on('scroll', () => {
      if($(window).scrollTop() > 100) {
        $('#header').addClass('is-scrolled');
      } else {
        $('#header').removeClass('is-scrolled');
      }
    });
  },
  finalize() {
  	// MODULES: Parallax
  	$(window).on('load resize scroll', () => {
  		const d_scroll = $(window).scrollTop();
  		const w_height = $(window).height();
  		$('.animate-parallax').each((i, e) => {
  			const $this = $(e);
  			const $thisBg = $this.find('.module-bg');
  			const p_position = $this.offset().top;
  			const e_height = $this.outerHeight();
  			const ebg_height = $this.find('.module-bg').outerHeight();
  			const bg_diff = ebg_height - e_height;
  			const dhit_in = p_position - w_height;
  			const dhit_out = p_position + e_height;
  			const dhit_read = p_position - w_height - d_scroll;
  			// Boolean hit Check
  			if (dhit_read <= 0 && d_scroll <= dhit_out) {
  				const per_scrolled = (d_scroll - dhit_in) / (dhit_out - dhit_in);
  				const offset = (bg_diff * per_scrolled);
  				$thisBg.css('transform', `translateY(-${offset}px)`);
  			}
  		});
  	});

  	// MODULES: Animate onScreen
  	$(window).on('load resize scroll', () => {
  		$('.animate-on-enter').each((i, el) => {
  			const $this = $(el);
  			if ($this.visible(true)) {
  				$this.addClass('is-visible');
  			}
  		});
  		$('.animate-on-leave').each((i, el) => {
  			const $this = $(el);
  			if (!$this.visible(true)) {
  				$this.removeClass('is-visible');
  			}
  		});
  	});

    $('#advantage-list').slick({
      slidesToShow: 4,
      autoplay: true,
      speed: 2000,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
          },
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 2,
            speed: 1500,
          },
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            speed: 1000,
          },
        },
      ],
    });

    $('#testimonials-wrap').slick({
      adaptiveHeight: true,
      autoplay: true,
    });
  },
};
