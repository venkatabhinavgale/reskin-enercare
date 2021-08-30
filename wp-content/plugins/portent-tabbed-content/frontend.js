window.onload = (event) => {
	const tabs = document.querySelectorAll('.block-tabbed-content__tab');
	console.log(tabs);
	tabs.forEach( tab => {
		tab.addEventListener( 'click', (event) => {
			console.log(event);
			let parent = event.target.parentElement;
			parent.childNodes.forEach( child => {
				child.classList.remove('active');
			});

			let topLevelParent =  event.target.parentElement.parentElement;
			let panels = topLevelParent.querySelectorAll('.wp-block-portent-block-tabbed-content--tab');
			let targetPanel = topLevelParent.querySelector(`[data-tab="${event.target.dataset.tab}"].wp-block-portent-block-tabbed-content--tab`);
			panels.forEach( panel => {
				panel.classList.remove('active');
			});
			targetPanel.classList.add('active');
			event.target.classList.add('active');
		});
	});
};
