window.onload = (event) => {
	const tabs = document.querySelectorAll('.block-tabbed-content__tab');
	tabs.forEach( tab => {
		tab.addEventListener( 'click', (event) => {
			let parent = event.target.parentElement;
			parent.childNodes.forEach( child => {
				child.classList.remove('active');
			});

			parent.classList.remove('init');
			let topLevelParent =  event.target.parentElement.parentElement;
			let tabPanelContainer = topLevelParent.querySelector('.block-tabbed-content__tab-panels');
				let panels = topLevelParent.querySelectorAll('.block-tabbed-content__tab-content');
			let targetPanel = topLevelParent.querySelector(`[data-tab="${event.target.dataset.tab}"].block-tabbed-content__tab-content`);
			panels.forEach( panel => {
				panel.classList.remove('active');
			});
			tabPanelContainer.classList.remove('init');
			targetPanel.classList.add('active');
			event.target.classList.add('active');
		});
	});
};
