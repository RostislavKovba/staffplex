"use strict";
//smooth scroll
$('a[href*="#"]')
  // Remove links that don't actually link to anything
  .not('[href="#"]')
  .not('[href="#0"]')
  .click(function(event) {
    // On-page links
    if (
      location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
      && 
      location.hostname == this.hostname
    ) {
      // Figure out element to scroll to
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      // Does a scroll target exist?
      if (target.length) {
        // Only prevent default if animation is actually gonna happen
        event.preventDefault();
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 1000, function() {
          // Callback after animation
          // Must change focus!
          var $target = $(target);
          $target.focus();
          if ($target.is(":focus")) { // Checking if the target was focused
            return false;
          } else {
            $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
            $target.focus(); // Set focus again
          };
        });
      }
    }
  });
///////////// form text show

function handleChangeDescWork() {
	if (!$('.corparate').siblings('.form-section').find('.desc-main').hasClass('hide-form-desc')) {
    	$('.corparate').siblings('.form-section').find('.desc-main').addClass('hide-form-desc');
} else {
    $('.desc-main').removeClass('hide-form-desc');
}
}
handleChangeDescWork();
function handleChangeDescOcomp() {
	if (!$('.work-text').siblings('.form-section').find('.desc-main').hasClass('hide-form-desc')) {
    	$('.work-text').siblings('.form-section').find('.desc-main').addClass('hide-form-desc');
} else {
    $('.desc-main').removeClass('hide-form-desc');
}
}
handleChangeDescOcomp();

function handleChangeDescWorkMain() {
	if (!$('.corparate').siblings('.form-section').find('.desc-single').hasClass('show-form-desc')) {
    	$('.corparate').siblings('.form-section').find('.desc-single').addClass('show-form-desc');
} else {
    $('.desc-single').removeClass('show-form-desc');
}
}
handleChangeDescWorkMain();
function handleChangeDescOcompMain() {
	if (!$('.work-text').siblings('.form-section').find('.desc-single').hasClass('show-form-desc')) {
    	$('.work-text').siblings('.form-section').find('.desc-single').addClass('show-form-desc');
} else {
    $('.desc-single').removeClass('show-form-desc');
}
}
handleChangeDescOcompMain();

///////////// relocate page after submit btn
document.addEventListener( 'wpcf7submit', function( event ) {
  if ( '597' == event.detail.contactFormId ) {
   location = 'http://staffplex.de/en/thank-you-page/';
  }
}, false );

document.addEventListener( 'wpcf7mailsent', function( event ) {
	if ( '6' == event.detail.contactFormId ) {
   location = 'http://staffplex.de/thanks-page/';
  }
}, false );
document.addEventListener( 'wpcf7mailsent', function( event ) {
	if ( '667' == event.detail.contactFormId ) {
   location = 'http://staffplex.de/de/dank-page/';
  }
}, false );
/////////////

function handleCheckPage() {
	if (!$('.chekout-page').closest('.work-text__text').closest('.container').closest('.work-text').siblings('.form-section').hasClass('hide-form-desc')) {
    	$('.chekout-page').closest('.work-text__text').closest('.container').closest('.work-text').siblings('.form-section').addClass('hide-form-desc');
} else {
    $('.form-section').removeClass('hide-form-desc');
}
}
handleCheckPage();
/////////////
    var burger = $('.header__burger'),
        navContent = $('.header__content');
    burger.on('click', function (e) {
      if ($(this).hasClass('open')) {
        $(this).removeClass('open');
        navContent.removeClass('open');
      } else {
        $(this).addClass('open');
        navContent.addClass('open');
      }
    }); // Rewards slider

    $('.rewards-slider').slick({
      slidesToShow: 3,
      slidesToScroll: 3,
      centerMode: false,
      prevArrow: '.rewards-left',
      nextArrow: '.rewards-right',
      infinite: false,
      dots: true,
      responsive: [{
        breakpoint: 1024,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2
        }
      }, {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          dots: true
        }
      }]
    }); // Scoll Header

    $(window).on("scroll", function () {
      if ($(window).scrollTop() > 100) {
        $(".header").addClass("active");
      } else {
        $(".header").removeClass("active");
      }
    }); // benefits__container

    var mediaServMob = window.matchMedia('(max-width: 480px)');

    function handleMobileChangeServ(e) {
      if (!e.matches) {
        if ($('.benefits__container').hasClass('slick-slider')) {
          $('.benefits__container').slick('unslick');
        }

        if ($('.testimonials__container').hasClass('slick-slider')) {
          $('.testimonials__container').slick('unslick');
        }

        if ($('.team__container').hasClass('slick-slider')) {
          $('.team__container').slick('unslick');
        }
      } else {
        $('.benefits__container').slick({
          slidesToShow: 1,
          dots: true,
          arrows: false,
          adaptiveHeight: true
        });
        $('.testimonials__container').slick({
          slidesToShow: 1,
          dots: true,
          arrows: false
        });
        $('.team__container').slick({
          slidesToShow: 1,
          dots: true,
          arrows: false
        });
      }
    }

    mediaServMob.addListener(handleMobileChangeServ);
    handleMobileChangeServ(mediaServMob);
    $(document).on('click', '.js-lang', function () {
      var $parent = $(this).closest('.lang');
      $parent.toggleClass('show');
    }); // ScrollTo

    var filterSection = $('.js-scroll-to'),
        scrollArrow = $('.scroll-down');
    scrollArrow.on('click', function () {
      console.log(1);
      window.scrollTo({
        top: filterSection.offset().top - 80,
        behavior: "smooth"
      });
    }); // Couters
    // $('.quality__num span').counterUp({
    //     delay: 10, time: 500
    // })

    $('.about-us__slider').slick({
      arrows: false,
      dots: true
    }); // GSAP

    var controller = new ScrollMagic.Controller();
    var tl1 = new TimelineMax();
    tl1.from(".benefits__item", {
      opacity: 0,
      duration: 2,
      y: 300,
      stagger: .25
    });
    var scene1 = new ScrollMagic.Scene({
      triggerElement: '.benefits-section',
      triggerHook: 'onEnter'
    }).setTween(tl1).addTo(controller);
    var tl2 = new TimelineMax();
    tl2.from(".testimonials-item", {
      opacity: 0,
      duration: 2,
      y: 300,
      stagger: .5
    });
    var scene2 = new ScrollMagic.Scene({
      triggerElement: '.testimonials-wrapper',
      triggerHook: 'onEnter'
    }).setTween(tl2).addTo(controller);
    var tl3 = new TimelineMax();
    tl3.from(".about-us__left", {
      opacity: 0,
      duration: 1,
      y: -300
    });
    tl3.from(".about-us__right", {
      opacity: 0,
      duration: 1,
      y: -300,
      delay: 0
    });
    var scene3 = new ScrollMagic.Scene({
      triggerElement: '.about-us',
      triggerHook: 'onEnter'
    }).setTween(tl3).addTo(controller);
    var tl4 = new TimelineMax();
    tl4.from(".plus", {
      opacity: 0,
      duration: 1,
      y: 300,
      stagger: .25
    });
    var scene4 = new ScrollMagic.Scene({
      triggerElement: '.pluses-container',
      triggerHook: 'onEnter'
    }).setTween(tl4).addTo(controller);
    var tl5 = new TimelineMax();
    tl5.from(".get-message__left", {
      opacity: 0,
      duration: 1,
      y: -300
    });
    tl5.from(".get-message__right", {
      opacity: 0,
      duration: 1,
      y: 300,
      delay: 0
    });
    var scene5 = new ScrollMagic.Scene({
      triggerElement: '.get-message',
      triggerHook: 'onEnter'
    }).setTween(tl5).addTo(controller);
    var tl6 = new TimelineMax();
    tl6.from(".testimonials__item", {
      opacity: 0,
      duration: 1,
      y: 300,
      stagger: .25
    });
    var scene6 = new ScrollMagic.Scene({
      triggerElement: '.testimonials__container',
      triggerHook: 'onEnter'
    }).setTween(tl6).addTo(controller);
    var tl7 = new TimelineMax();
    tl7.from(".news-section__news-item", {
      opacity: 0,
      duration: 1,
      y: 300,
      stagger: .25
    });
    var scene7 = new ScrollMagic.Scene({
      triggerElement: '.news-section__news',
      triggerHook: 'onEnter'
    }).setTween(tl7).addTo(controller);
    var tl8 = new TimelineMax();
    tl8.from(".portfolio__item", {
      opacity: 0,
      duration: 1,
      y: 300,
      stagger: .25
    });
    var scene8 = new ScrollMagic.Scene({
      triggerElement: '.portfolio__container',
      triggerHook: 'onEnter'
    }).setTween(tl8).addTo(controller);
    var tl9 = new TimelineMax();
    tl9.from(".half-section.e--left", {
      opacity: 0,
      duration: 1,
      x: -300
    });
    tl9.from(".half-section.e--right", {
      opacity: 0,
      duration: 1,
      x: 300,
      delay: 0
    });
    var scene9 = new ScrollMagic.Scene({
      triggerElement: '.half-sections e--40-60',
      triggerHook: 'onEnter'
    }).setTween(tl9).addTo(controller); // var tl10 = new TimelineMax();
    // tl10.from(".half-section.e--left", {opacity: 0, duration: 1, x:-300, })
    // tl10.from(".half-section.e--right", {opacity: 0, duration: 1, x:300, delay: 0 })   
    // const scene10 = new ScrollMagic.Scene({
    //     triggerElement: '.half-sections e--40-60',
    //     triggerHook: 'onEnter'
    // }).setTween(tl10).addTo(controller)

    var tl11 = new TimelineMax();
    tl11.from(".visa-conditions__item", {
      opacity: 0,
      duration: 1,
      scale: 0,
      stagger: .25
    });
    var scene11 = new ScrollMagic.Scene({
      triggerElement: '.visa-conditions',
      triggerHook: 'onEnter'
    }).setTween(tl11).addTo(controller);
    var tl12 = new TimelineMax();
    tl12.from(".video-container", {
      opacity: 0,
      duration: 1,
      scale: 0
    });
    var scene12 = new ScrollMagic.Scene({
      triggerElement: '.video-section',
      triggerHook: 'onEnter'
    }).setTween(tl12).addTo(controller);
    var tl13 = new TimelineMax();
    tl13.from(".corparate__img", {
      opacity: 0,
      duration: 1,
      x: -300
    });
    tl13.from(".corparate__video-wrapper", {
      opacity: 0,
      y: -200,
      scale: 0,
      duration: 1,
      delay: -1
    });
    var scene13 = new ScrollMagic.Scene({
      triggerElement: '.corparate__inner',
      triggerHook: 'onEnter'
    }).setTween(tl13).addTo(controller);
    var tl14 = new TimelineMax();
    tl14.from(".team__item", {
      opacity: 0,
      duration: 1,
      scale: 0,
      y: 300,
      stagger: .25
    });
    var scene14 = new ScrollMagic.Scene({
      triggerElement: '.team__container',
      triggerHook: 'onEnter'
    }).setTween(tl14).addTo(controller);


$('.js-employers-testiomonials').slick({
  slidesToShow: 4,
  slidesToScroll: 4,
  arrows: false,
  dots: true,
  infinite: false,
  responsive: [{
    breakpoint: 1024,
    settings: {
      slidesToShow: 3,
      slidesToScroll: 3
    }
  }, {
    breakpoint: 768,
    settings: {
      slidesToShow: 2,
      slidesToScroll: 2
    }
  }, {
    breakpoint: 480,
    settings: {
      slidesToShow: 1,
      slidesToScroll: 1
    }
  }]
});
