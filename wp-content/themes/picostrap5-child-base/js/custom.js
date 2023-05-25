// to enable the enqueue of this optional JS file, 
// you'll have to uncomment a row in the functions.php file
// just read the comments in there mate

console.log("Custom js file loaded");

//add here your own js code. Vanilla JS welcome.
//site header mobile menu button toggle text
function menuToggle() {
var x = document.getElementById("nav-menu_mobile");
  if (x.innerHTML === "menu") {
    x.innerHTML = "close";
  } else {
    x.innerHTML = "menu";
  }
}

jQuery(function($) {
	$('a').each(function() {
	var a = new RegExp('/' + window.location.host + '/');
	if(!a.test(this.href)) {
		$(this).attr('target', '_blank').attr('rel', 'noopener external');
		// $(this).click(function(event) {
		// 	event.preventDefault();
		// 	event.stopPropagation();
		// 	window.open(this.href, '_blank');
		// });
	}
	});
});

jQuery('.site-posts-carousel').each(function() {
	let elem = jQuery(this);
	let swiperElem = elem.find('.swiper');
	let prev = elem.find('.e-slide-prev');
	let next = elem.find('.e-slide-next');
	let postsCarousel = new Swiper(swiperElem[0], {
		// Optional parameters
		spaceBetween: 24,
		loop: false,
		// If we need pagination
		pagination: {
			el: '.swiper-pagination',
		},
		// Navigation arrows
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},
		breakpoints: {
			991: {
				slidesPerView: 2,
			}
		}
	});
	prev.on('click', function(e) {
		e.preventDefault();
		postsCarousel.slidePrev();
	});
	next.on('click', function(e) {
		e.preventDefault();
		postsCarousel.slideNext();
	});
});

$(document).ready(function () {
    $(".slick-carousel.advisoryBoard").slick({
        speed: 5000,
        autoplay: true,
        autoplaySpeed: 0,
        cssEase: 'linear',
        slidesToShow: 5,
        slidesToScroll: 1,
        infinite: true,
        variableWidth: true,
        arrows: false,
        swipeToSlide: true,
        centerMode: true,
        focusOnSelect: true,
        responsive: [
            {
                breakpoint: 1199,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 575,
                settings: {
                    slidesToShow: 2,
                }
            }
        ]
    });
});