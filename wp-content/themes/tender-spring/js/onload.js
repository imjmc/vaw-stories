/**
 * Functions on load
 */
var navigation = null;
jQuery(window).load(function() {
	
	// the back to top link
	jQuery("a[href='#top']").click(function() {
	  jQuery("html, body").animate({ scrollTop: 0 }, "slow");
	  return false;
	});
	
	loadBasedOnMoreDisplay();
}); // end of DOM ready

jQuery(window).resize(function() {
	loadBasedOnMoreDisplay();
}); // end of window resize

function loadBasedOnMoreDisplay() {
	// is it mobile?
	var mobile = false;

	if(jQuery('#more').css('display') == 'block') {
		mobile = true;
	}

	if(mobile) {
		if(navigation == null) {
			navigation = jQuery("#nav-menu-wrapper ul").tinyNav({active: 'current_page_item'});
			search_bar();
		}
	} else {
		primary_height();
		undo_search_bar();
	}
}

function primary_height() {
	var leftContainer = document.getElementById('secondary');
	var rightContainer = document.getElementById('primary');

	if(leftContainer && rightContainer) {
		var leftContainerHeight = leftContainer.offsetHeight;
		var rightContainerHeight = rightContainer.offsetHeight;

		if(leftContainerHeight > rightContainerHeight) {
			if(jQuery.browser.msie && jQuery.browser.version == '6.0') {
				jQuery("#primary").height(leftContainerHeight);
			} else {
				jQuery("#primary").attr("style", "min-height: "+leftContainerHeight+"px");
			}
		}
	}
}

function search_bar() {
	var searchBar = jQuery('.widget_search');

	if(jQuery(searchBar)) {
		// hide it
		jQuery('.widget_search').css({'display':'none'});

		var searchBarContainer = jQuery('<div id="search-bar"></div>').appendTo('#more');

		jQuery(searchBarContainer).html(jQuery(searchBar).html());
	}
}

function undo_search_bar() {
	var searchBar = jQuery('.widget_search');

	if(jQuery(searchBar)) {
		// hide it
		jQuery('.widget_search').css({'display':'block'});
	}
}