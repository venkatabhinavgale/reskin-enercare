window.addEventListener('load', function () {
	let columnCarousel = document.querySelectorAll('.block-blog-posts');
	columnCarousel.forEach(function (carousel) {

		let id = '5772835235';

		new Glider(carousel, {
			slidesToShow: 1,
			slidesToScroll: 1,
			itemWidth: 260,
			arrows: {
				prev: '.related-posts__glider-prev',
				next: '.related-posts__glider-next'
			},
			dots: '.related-posts__glider-dots',
			responsive: [
				{
					// screens greater than >= 775px
					breakpoint: 768,
					settings: {
						// Set to `auto` and provide item width to adjust to viewport
						slidesToShow: 'auto',
						slidesToScroll: 'auto',
						itemWidth: 260,
						duration: 0.25
					}
				}, {
					// screens greater than >= 1024px
					breakpoint: 1024,
					settings: {
						slidesToShow: 4,
						slidesToScroll: 1,
						itemWidth: 260,
						duration: 0.25
					}
				}
			]
		});
	});

	/**
	 * Setup Next/Previous Status Reporters
	 */
	let gliderNotificationCenter;
	gliderNotificationCenter = document.querySelector('#gliderNotificationCenter');

	let reviewCarouselAction = function(event, direction) {
		gliderNotificationCenter.textContent = '';
		if(!event.target.classList.contains('disabled') && window.outerWidth >= 1024) {
			gliderNotificationCenter.textContent = `Carousel moved to ${direction} group of 4 items.`;
		} else if(!event.target.classList.contains('disabled') && window.outerWidth < 775) {
			gliderNotificationCenter.textContent = `Carousel moved to ${direction} item.`;
		}
	};

	let reviewsCarouselPrev = document.querySelectorAll('.related-posts__glider-prev');
	let reviewsCarouselNext = document.querySelectorAll('.related-posts__glider-next');

	if(typeof reviewsCarouselPrev !== 'undefined'){
		reviewsCarouselPrev.forEach(function(button){
			button.addEventListener('click', function(event){
				reviewCarouselAction(event, 'Previous');
			});
		});
	}

	if(typeof reviewsCarouselPrev !== 'undefined'){
		reviewsCarouselNext.forEach(function(button){
			button.addEventListener('click', function(event){
				reviewCarouselAction(event, 'Next');
			});
		});
	}
});
