window.addEventListener('load', function () {
	let columnCarousel = document.querySelectorAll('.block-blog-posts.is_mobile_carousel');
	columnCarousel.forEach(function (carousel) {

		new Glider(carousel, {
			slidesToShow: 1,
			slidesToScroll: 1,
			itemWidth: 260,
			arrows: {
				prev: '.blog-posts__glider-prev',
				next: '.blog-posts__related-posts__glider-next'
			},
			dots: '.blog-posts__glider-dots',
		});
	});
});
