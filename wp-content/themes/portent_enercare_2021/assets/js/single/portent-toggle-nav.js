/**
 * Toggle Navigation Script
 */
let PortentToggleNav = function(){};
PortentToggleNav.prototype.menu = '';
PortentToggleNav.prototype.logo = null;
PortentToggleNav.prototype.cta = null;
PortentToggleNav.prototype.mobileWidth = 1023;
PortentToggleNav.prototype.init = function() {

	if(this.menu !== '') {
		/*
		Add a class for style tracking
		 */
		this.menu.classList.add('portent-toggle-nav');
		this.setupMobileToggle();
		this.setupStatusArea();
		this.setupBrandArea();
		this.navigationMenuToggle(this.menu);
		this.setupClickOutside();
	} else {
		console.log('Please set a menu property');
	}

};
PortentToggleNav.prototype.setupClickOutside = function() {
	/**
	 * Handle Closing the menu when a user clicks outside of the frame
	 */

		//THIS gets weird once we start to dive down into functions. To make sure we are calling the top level prototype when we ask for properties and functions we need to save top level this into a new variable.
	let _this = this;
	let navigationMenu = this.menu;
	document.addEventListener("click", function(event) {
		let isNavigationInClick = navigationMenu.contains(event.target);
		if(!isNavigationInClick) {
			_this.closeAllMenus(navigationMenu);
		}
	});
};

PortentToggleNav.prototype.setupBrandArea = function() {
	const _this = this;
	const brandAreaContainer = document.createElement('div');
	brandAreaContainer.classList.add('brand-area');

	if(this.logo) {
		const brandLogoElement = document.createElement('img');
		brandLogoElement.classList.add('brand-area__logo');
		brandLogoElement.src = this.logo;
		brandAreaContainer.appendChild(brandLogoElement);
	}

	if(this.cta) {
		const brandCTAElement = document.createElement('div');
		brandCTAElement.classList.add('brand-area__cta');
		brandCTAElement.innerHTML = this.cta;
		brandAreaContainer.appendChild(brandCTAElement);
	}

	this.menu.insertBefore(brandAreaContainer, this.menu.children[0]);
};

PortentToggleNav.prototype.setupStatusArea = function() {
	const _this = this;
	const menuElement = this.menu;
	const statusAreaContainer = document.createElement('div');
	const statusAreaBackButton = document.createElement('button');
	const statusAreaCloseButton = document.createElement('button');

	statusAreaContainer.setAttribute('aria-hidden', "true");
	statusAreaContainer.setAttribute('data-interface', 'statusArea');

	statusAreaCloseButton.innerText = 'Close';
	statusAreaCloseButton.classList.add('mobile-close-btn');
	statusAreaBackButton.innerText = 'Back to main menu';
	statusAreaBackButton.classList.add('mobile-back-btn');

	statusAreaContainer.appendChild(statusAreaBackButton);
	statusAreaContainer.appendChild(statusAreaCloseButton);
	menuElement.insertBefore(statusAreaContainer, menuElement.children[0]);

	statusAreaBackButton.addEventListener("click", function(){_this.closeAllMenus(menuElement);});
	statusAreaCloseButton.addEventListener("click", function(){_this.closeMobileMenu(menuElement);});
};

PortentToggleNav.prototype.setupMobileToggle = function() {
	const _this = this;
	const menuElement = this.menu;

	let mobileMenuToggle;
	if(this.toggleButton) {
		mobileMenuToggle = this.toggleButton;
	} else {
		mobileMenuToggle.innerText = 'Menu';
		mobileMenuToggle = document.createElement('button');
		menuElement.parentElement.insertBefore(mobileMenuToggle, menuElement);
	}

	mobileMenuToggle.addEventListener("click", function(){_this.openMobileMenu(_this.menu);});
	mobileMenuToggle.setAttribute('aria-expanded', 'false');
};

/**
 * This is likely better handled through a dispatched event listener
 * @param menuState
 */
PortentToggleNav.prototype.setSubMenuStatus = function(menuState= false) {
	if(menuState) {
		this.menu.setAttribute('data-menu', 'open');
	} else {
		this.menu.removeAttribute('data-menu');
	}
};

PortentToggleNav.prototype.navigationMenuToggle = function(navigationContainer) {
	let menuItems = navigationContainer.querySelectorAll('[data-children=true]');

	//THIS gets weird once we start to dive down into functions. To make sure we are calling the top level prototype when we ask for properties and functions we need to save top level this into a new variable.
	let _this = this;
	menuItems.forEach.call(menuItems, function(el, i){
		el.querySelector('button').addEventListener("click",  function(event){
			if (this.parentNode.dataset.open === 'true') {
				/**
				 * If the same menu button we are clicking on is already visible then toggle it closed
				 * @type {string}
				 */
				this.parentNode.dataset.open = 'false';
				this.setAttribute('aria-expanded', "false");
				_this.setSubMenuStatus();
			} else {
				/**
				 * If the button we are clicking on is not open, reset all open menus before displaying the current option
				 */
				_this.closeAllMenus(navigationContainer);
				this.parentNode.dataset.open = 'true';
				this.setAttribute('aria-expanded', "true");
				_this.setSubMenuStatus(true);
			}

			/**
			 * Focus The First Item
			 */
			_this.focusFirstOption(this.parentNode);

			return false;
		});

		el.querySelector('button').addEventListener("keydown", function(event) {
			console.log(window.outerWidth);
			if(event.keyCode === 40 || (window.outerWidth <= _this.mobileWidth && event.keyCode === 39)) {
				event.preventDefault();
				console.log('Key code 40');

				/**
				 * @todo This is a duplication of the opening menu logic. Condense this.
				 */
				if (event.target.parentNode.dataset.open === 'true') {
					/**
					 * If the same menu button we are clicking on is already visible then toggle it closed
					 * @type {string}
					 */
					event.target.dataset.open = 'false';
					event.target.setAttribute('aria-expanded', "false");
					_this.setSubMenuStatus(false);
				} else {
					/**
					 * If the button we are clicking on is not open, reset all open menus before displaying the current option
					 */
					_this.closeAllMenus(navigationContainer);
					event.target.parentNode.dataset.open = 'true';
					event.target.setAttribute('aria-expanded', "true");
					_this.setSubMenuStatus(true);

					/**
					 * Focus The First Item
					 */
					_this.focusFirstOption(this.parentNode);
				}
			}

			if(event.keyCode === 38) {
				console.log('Key code 38');
				_this.closeAllMenus(navigationContainer);
			}

			return false;
		});

		/**
		 * Event Listeners for ALL link elements within the current top level list item
		 * We are tracking all links within the top level container so that when links are buried in containers
		 * and out of sequence we can still locate the next logical link in the list.
		 */
		el.querySelectorAll('a').forEach( function(elem) {
			console.log('link for each');
			elem.addEventListener('keydown', function(event) {
				console.log('link key press');
				console.log('arrow press');
				if(event.keyCode === 40 && event.keyCode === 38) {
					event.stopPropagation();
					event.preventDefault();
					_this.findNextMenuLink(event, el);
				}
			});

			elem.addEventListener('keyup', function(event) {
				//Close menu and focus on closest button when Escape is pressed on a menu item
				if(event.keyCode === 27 ){
					_this.closeAllMenus(navigationContainer);
					el.querySelector('button').focus();
				}
			});
		});
	});
};

/*
This function essentially serves as a keyboard trap for the current menu.
 */
PortentToggleNav.prototype.findNextMenuLink = function(event, topLevelParent) {
	console.log(topLevelParent);
	let allLinks;

	if(window.outerWidth <= this.mobileWidth) {
		let mobileElements = Array.from(this.menu.querySelectorAll('.mobile-back-btn, .mobile-close-btn'));
		allLinks = Array.from(topLevelParent.querySelectorAll('a'));
		allLinks = [...mobileElements, ...allLinks];
	} else {
		allLinks = Array.from(topLevelParent.querySelectorAll('a'));
	}
	console.log(allLinks);
	let firstFocusableLink = allLinks[0];
	let lastFocusableLink = allLinks[allLinks.length - 1];
	let currentElement = document.activeElement;

	/**
	 * If the user has pressed up on the final focusable in the set, shift focus to the last
	 * It is important that we return if this statement is true so that we do not duplicate the action.
	 */
	if(currentElement === firstFocusableLink && event.keyCode === 38 || currentElement === lastFocusableLink && (window.outerWidth <= this.mobileWidth && event.keyCode === 37) ) {
		lastFocusableLink.focus();
		return;
	}

	/**
	 * If the user has pressed down on the final focusable item in the list shift focus to the first item in the set
	 * It is important that we return if this statement is true so that we do not duplicate the action.
	 */
	if(currentElement === lastFocusableLink && event.keyCode === 40 || currentElement === lastFocusableLink && (window.outerWidth <= this.mobileWidth && event.keyCode === 39) ) {
		firstFocusableLink.focus();
		return;
	}

	/**
	 * If a user has pressed the up or down arrow while a menu item is focused and neither is the first or last element
	 * then loop through the list until
	 */
	allLinks.forEach(function(link, index) {
		if(currentElement === link ) {
			if(event.keyCode === 40 || event.keyCode === 39 ) {
				allLinks[index+1].focus();
			} else if(event.keyCode === 38 || event.keyCode === 37 ){
				allLinks[index-1].focus();
			}
		}
	});
};

PortentToggleNav.prototype.closeAllMenus = function(navigationContainer) {
	let openMenus = navigationContainer.querySelectorAll('button[aria-expanded=true]');

	openMenus.forEach(function(elem) {
		elem.parentNode.dataset.open = 'false';
		elem.setAttribute('aria-expanded', "false");
	});
	this.setSubMenuStatus(false);
};

PortentToggleNav.prototype.setDocumentAttribute = function() {
	const bodyElement = document.querySelector('body');
	bodyElement.setAttribute('data-menu', 'open');
}

PortentToggleNav.prototype.removeDocumentAttribute = function() {
	let bodyElement = document.querySelector('body');
	bodyElement.removeAttribute('data-menu');
}

PortentToggleNav.prototype.openMobileMenu = function(menuElement) {

	menuElement.setAttribute('data-mobile', 'open');
	this.setDocumentAttribute();
	const firstMenuItem = this.menu.querySelector('.menu-item button');
	firstMenuItem.focus();
};

PortentToggleNav.prototype.closeMobileMenu = function() {
	this.removeDocumentAttribute();
	this.closeAllMenus(this.menu);

	if(this.menu.getAttribute('data-mobile') === 'open' ) {
		this.menu.removeAttribute('data-mobile');
	}

	this.setSubMenuStatus(false);
};

PortentToggleNav.prototype.focusFirstOption = function(topLevelItem) {
	console.log('focusing first option');
	console.log(topLevelItem);
	let firstLink = topLevelItem.querySelector('.sub-menu a');
	console.log(firstLink);
	firstLink.focus({preventScroll:true});
	console.log(document.activeElement);
};
