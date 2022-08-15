window.addEventListener('load', function(){
	let blockReviews = document.querySelector('.block-reviews__glider');
	let prevArrow, prevArrowImage, nextArrow, nextArrowImage, dots, imagePath;

	imagePath = '/wp-content/themes/portent_enercare_2021/assets/icons/utility/';

	//prevArrow = document.createElement( 'button' );
	// prevArrowImage = document.createElement( 'img' );
	// prevArrow.classList.add( 'button__prev','block-reviews__prev');
	// prevArrow.setAttribute('aria-label', 'Previous');
	// prevArrowImage.setAttribute('src', `${imagePath}arrow_back.svg`);
	// prevArrowImage.setAttribute( 'alt', 'Previous');
    // prevArrowImage.setAttribute( 'height', '24');
    // prevArrowImage.setAttribute( 'width', '24');
	// prevArrow.appendChild( prevArrowImage );

	// nextArrow = document.createElement( 'button' );
	// nextArrowImage = document.createElement( 'img' );
	// nextArrow.classList.add( 'button__next','block-reviews__next');
	// nextArrow.setAttribute('aria-label', 'Next');
	// nextArrowImage.setAttribute('src', `${imagePath}arrow_forward.svg`);
	// nextArrowImage.setAttribute( 'alt', 'Next');
  // nextArrowImage.setAttribute( 'height', '24');
  // nextArrowImage.setAttribute( 'width', '24');
	// nextArrow.appendChild( nextArrowImage );


	// dots = document.createElement( 'div' );
	// dots.classList.add('dots', 'block-reviews__dots');
	// dots.setAttribute( 'role', 'tablist');

	// blockReviews.parentNode.insertBefore(dots, blockReviews.nextSibling);
	// blockReviews.parentNode.insertBefore(nextArrow, blockReviews.nextSibling);
	// blockReviews.parentNode.insertBefore(prevArrow, blockReviews.nextSibling);

const reviewsGlider = new Glider(blockReviews, {
	slidesToShow: 1,
	slidesToScroll: 1,
	draggable: true,
	scrollLock : true,
	duration: 1,
	scrollLockDelay: 500,
	dots: '.block-reviews__dots',
	arrows: {
		prev: '.block-reviews__prev',
		next: '.block-reviews__next'
	},
	responsive: [
		{
			// screens greater than >= 775px
			breakpoint: 775,
			settings: {
				// Set to `auto` and provide item width to adjust to viewport
				slidesToShow: 2,
				slidesToScroll: 1,
				itemWidth: 150,
				duration: 0.25
			}
		},{
			// screens greater than >= 1024px
			breakpoint: 1024,
			settings: {
				slidesToShow: 4,
				slidesToScroll: 1,
				itemWidth: 150,
				duration: 0.25
			}
		}
	]
});

	let gliderNotificationCenter;
	gliderNotificationCenter = document.querySelector('#gliderNotificationCenter');

	/**
	 * Glider Change Listener
	 */
	blockReviews.addEventListener('glider-slide-visible', function(event){
		gliderNotificationCenter.textContent = `Review ${event.detail.slide + 1} is now visible`;
	});

	/**
	 * Setup Next/Previous Status Reporters
	 */

	let reviewsCarouselPrev = document.querySelector('.block-reviews__prev');
	let reviewsCarouselNext = document.querySelector('.block-reviews__next');

	let reviewCarouselAction = function(event, direction) {
		gliderNotificationCenter.textContent = '';
		let closestSlide = event.target.closest('.glider-slide.visible');
		console.log(closestSlide);
		if(!event.target.classList.contains('disabled') && window.outerWidth >= 1024) {
			gliderNotificationCenter.textContent = `Carousel of reviews moved to ${direction} slide of 4 reviews.`;
		} else if(!event.target.classList.contains('disabled') && window.outerWidth < 775) {
			gliderNotificationCenter.textContent = `Carousel of reviews moved to ${direction} review.`;
		}
	};

	if(typeof reviewsCarouselPrev !== 'undefined'){
		reviewsCarouselNext.addEventListener('click', function(event){
			reviewCarouselAction(event, 'Next');
		});
	}

	if(typeof reviewsCarouselPrev !== 'undefined'){
		reviewsCarouselPrev.addEventListener('click', function(event){
			reviewCarouselAction(event, 'Previous');
		});
	}

});

