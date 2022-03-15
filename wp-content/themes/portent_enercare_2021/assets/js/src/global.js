jQuery(function($){

	// Mobile Menu
	$('.menu-toggle').click(function(){
			// $('.search-toggle, .header-search').removeClass('active');
			// $('.menu-toggle, .nav-menu').toggleClass('active');
	});
	$('.menu-item-has-children > .submenu-expand').click(function(e){
		$(this).toggleClass('expanded');
		e.preventDefault();
	});

	// Search toggle
	$('.search-toggle').click(function(){
		$('.menu-toggle, .nav-menu').removeClass('active');
		$('.search-toggle, .header-search').toggleClass('active');
		$('.site-header .search-field').focus();
	});

  // AddSearch JS client with an example index. Get your own SITEKEY by signing up at www.addsearch.com
  var client = new AddSearchClient('3145819e621ccfb6dbf5116b2c92967b');
  var conf = {
    searchResultsPageUrl: '/',
    searchParameter: 'addsearch',
    updateBrowserHistory: false
  }
  // Search UI instance
  var searchui = new AddSearchUI(client, conf);
  // Add components
  searchui.searchField({
    autofocus: false,
    containerId: 'searchfield',
    placeholder: 'Search',
    icon: false
  });

	// Mobile Search UI instance
	var mobileSearchui = new AddSearchUI(client, conf);
	// Add components
	mobileSearchui.searchField({
		autofocus: false,
		containerId: 'mobile-searchfield',
		placeholder: 'Search',
		icon: false
	});

  // var autocompleteClient = new AddSearchClient('3145819e621ccfb6dbf5116b2c92967b');
  // autocompleteClient.setPaging(1, 7, 'relevance', 'desc'); // Fetch 7 results by default
  //
  // var autocompleteTemplate = `
  //   <div class="addsearch-autocomplete" style="position: relative;">
  //     {{#gt searchResults.results.length 0}}
  //     <span class="addsearch-autocomplete__total-results">{{searchResults.results.length}} results</span>
  //       <ul>
  //         {{#each ../searchResults.results}}
  //           <li>
  //             <strong><a href="{{url}}">{{title}}</a></strong>
  //           </li>
  //         {{/each}}
  //       </ul>
  //     {{/gt}}
  //   </div>
  // `;
  //
  // searchui.autocomplete({
  //   containerId: 'autocomplete',
  //   template: autocompleteTemplate,
  //   infiniteScrollElement: document.querySelector('#scrollable'),
  //   sources: [
  //     {
  //       type: AddSearchUI.AUTOCOMPLETE_TYPE.SEARCH,
  //       client: autocompleteClient,
  //       jsonKey: 'results'
  //     }
  //   ]
  // });

  // All components added. Start
  searchui.start();

  //Enercare Specific function
  (function (window,document, undefined) {

    window.Enercare = {};

    /**
     * Array of url parameters structured with the key
     * as the key we will store/pull from sessionStorage
     * and the value as a string of what url parameter we
     * will need to pull the data from.
     */
    window.Enercare.PPCparams = [
      { utm_source: 'utm_source' },
      { utm_medium: 'utm_medium' },
      { utm_campaign: 'utm_campaign' },
      /*
      { Keyword: 'keyword' },
      { Campaign: 'cid' },
      { AdGroup: 'aid' },
      { GoogleCookieID: 'gclid' },
      { ReferralCode: 'refcode' },
      { DeviceType: '' }
      */
    ];


    /**
     * Cookie value grab for closed loop analytics in Google Tag Manager.
     * Imlemented via portent.
     * @param cname
     * @returns {string}
     */
    function getCookie(cname) {
      var name = cname + "=";
      var decodedCookie = decodeURIComponent(document.cookie);
      var ca = decodedCookie.split(';');
      for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
          c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
          return c.substring(name.length, c.length);
        }
      }
      return "";
    }

    window.Enercare.getUrlParameter = function(name) {
      const n = name.replace(/[[]/, '\\[').replace(/[\]]/, '\\]');
      const regex = new RegExp(`[\\?&]${n}=([^&#]*)`);
      const results = regex.exec(location.search);
      return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
    };

    window.Enercare.logPPCParamsToStorage = () => {
      window.Enercare.PPCparams.forEach(param => {
        const key = Object.keys(param)[0];
        const urlParam = param[key];

        if (!sessionStorage[key]) {
          sessionStorage[key] = window.Enercare.getUrlParameter(urlParam);
        }
      });
    };

    window.Enercare.handleHiddenFormFields = function(form) {
      // handle the VendorCookieID/ruid
      if (form.VendorCookieID === undefined) {
        var input = document.createElement("input");
        input.setAttribute("type", "hidden");
        input.setAttribute("name", "ruid");
        input.setAttribute("value", getCookie('ruid'));
        form.appendChild(input);
      } else {
        form.VendorCookieID.setAttribute("value", getCookie('ruid'));
      }

      // loop through our PPC params
      window.Enercare.PPCparams.forEach(param => {
        const key = Object.keys(param)[0];

        // if form element does not exist, create it and append to form
        if (form.key === undefined) {
          var input = document.createElement("input");
          input.setAttribute("type", "hidden");
          input.setAttribute("name", key);
          input.setAttribute("value", sessionStorage[key]);
          form.appendChild(input);
        } else {
          // otherwise, update the value of the hidden field
          form.key.setAttribute("value", sessionStorage[key]);
        }

      });
    }

    /**
     * Loop through PPCparams
     * check to see if sessionStorage item exists for that key
     * make sure theres no value, then push the value from the
     * url parameter provided
     */
    window.Enercare.logPPCParamsToStorage();

    /** Get the gravity form and handle hidden form field inputs */
    var gravityForm = $('.gform_wrapper form');
    if (gravityForm.length) {
      window.Enercare.handleHiddenFormFields(gravityForm[0]);
    }

  })(window,document);

});

/**
 * Toggle Navigation Script
 */
window.addEventListener('load', setupToggleNav);

function setupToggleNav() {
	const primaryNavigation = document.getElementById('primary-menu');
	navigationMenuToggle(primaryNavigation);

	/**
	 * Handle Closing the menu when a user clicks outside of the frame
	 */
	document.addEventListener("click", function(event) {
		let isNavigationInClick = primaryNavigation.contains(event.target)
		if(!isNavigationInClick) {
			closeAllMenus(primaryNavigation);
		}
	});
}

function closeAllMenus(navigationContainer) {
	let openMenus = navigationContainer.querySelectorAll('button[aria-expanded=true]');
	openMenus.forEach(function(elem) {
		elem.parentNode.dataset.open = 'false';
		elem.setAttribute('aria-expanded', "false");
	});
}

function focusFirstOption(topLevelItem) {
	let firstLink = topLevelItem.querySelector('a');
	firstLink.focus();
}

/*
This function essentially serves as a keyboard trap for the current menu.
 */
function findNextMenuLink(event, topLevelParent) {
	let allLinks = topLevelParent.querySelectorAll('a');
	let firstFocusableLink = allLinks[0];
	let lastFocusableLink = allLinks[allLinks.length - 1];
	let currentElement = document.activeElement;

	/**
	 * If the user has pressed up on the final focusable in the set, shift focus to the last
	 * It is important that we return if this statement is true so that we do not duplicate the action.
	 */
	if(currentElement === firstFocusableLink && event.keyCode === 38 ) {
			lastFocusableLink.focus();
			return;
	}

	/**
	 * If the user has pressed down on the final focusable item in the list shift focus to the first item in the set
	 * It is important that we return if this statement is true so that we do not duplicate the action.
	 */
	if(currentElement === lastFocusableLink &&  event.keyCode === 40 ) {
		firstFocusableLink.focus();
		return;
	}

	/**
	 * If a user has pressed the up or down arrow while a menu item is focused and neither is the first or last element
	 * then loop through the list until
	 */
	allLinks.forEach(function(link, index) {
			if(currentElement === link ) {
				if(event.keyCode === 40) {
					allLinks[index+1].focus();
				} else if(event.keyCode === 38 ){
					allLinks[index-1].focus();
				}
			}
		});
}

function navigationMenuToggle(navigationContainer) {
	let menuItems = navigationContainer.querySelectorAll('[data-children=true]');

	Array.prototype.forEach.call(menuItems, function(el, i){
		el.querySelector('button').addEventListener("click",  function(event){
			if (this.parentNode.dataset.open === 'true') {
				/**
				 * If the same menu button we are clicking on is already visible then toggle it closed
				 * @type {string}
				 */
				this.parentNode.dataset.open = 'false';
				this.setAttribute('aria-expanded', "false");
			} else {
				/**
				 * If the button we are clicking on is not open, reset all open menus before displaying the current option
				 */
				closeAllMenus(navigationContainer);
				this.parentNode.dataset.open = 'true';
				this.setAttribute('aria-expanded', "true");
			}

			/**
			 * Focus The First Item
			 */
			focusFirstOption(this.parentNode);

			return false;
		});

		el.querySelector('button').addEventListener("keyup", function(event) {
			if(event.keyCode === 40 ) {
				event.preventDefault();

				/**
				 * @todo This is a duplication of the opening menu logic. Condense this.
				 */
				if (this.parentNode.dataset.open === 'true') {
					/**
					 * If the same menu button we are clicking on is already visible then toggle it closed
					 * @type {string}
					 */
					this.parentNode.dataset.open = 'false';
					this.setAttribute('aria-expanded', "false");
				} else {
					/**
					 * If the button we are clicking on is not open, reset all open menus before displaying the current option
					 */
					closeAllMenus(navigationContainer);
					this.parentNode.dataset.open = 'true';
					this.setAttribute('aria-expanded', "true");

					/**
					 * Focus The First Item
					 */
					focusFirstOption(this.parentNode);
				}
			}

			if(event.keyCode === 38) {
				closeAllMenus(navigationContainer);
			}

			return false;
		}, true);

		/**
		 * Event Listeners for ALL link elements within the current top level list item
		 * We are tracking all links within the top level container so that when links are buried in containers
		 * and out of sequence we can still locate the next logical link in the list.
		 */
		el.querySelectorAll('a').forEach( function(elem) {
			elem.addEventListener('keydown', function(event) {
				if(event.keyCode === 40 || event.keyCode === 38) {
					event.stopPropagation();
					event.preventDefault();
					findNextMenuLink(event, el);
				}
			});

			elem.addEventListener('keyup', function(event) {
				//Close menu and focus on closest button when Escape is pressed on a menu item
				if(event.keyCode === 27 ){
					closeAllMenus(navigationContainer);
					el.querySelector('button').focus();
				}
			});
		});
	});
}
