// page init
jQuery(function(){
	initDrop();
	initMobileNav();
	//initProjectsDrop();
	initLightBox();
	initCheckDrop();
	initUrlCheck();
});

function initUrlCheck() {
	var holder = jQuery('#welcome-popup');
	var holder2 = jQuery('#upgrade-popup');
	//added by V on7-31 for video-holder
	var holder3= jQuery('#video-lightbox');
	var visibleClass = 'visible';

	var removeLightbox = function() {
		holder.removeClass(visibleClass);
		holder2.removeClass(visibleClass);
		holder3.removeClass(visibleClass);
	}

	jQuery(document).on('click', '#welcome-popup .close, #upgrade-popup .close, #video-lightbox .close', function(e) {
		e.preventDefault();

		removeLightbox();
	});

	jQuery(document).on('click', '.overlay', function(e) {
		removeLightbox();
	});

	if (window.location.search.indexOf('hello=1') > -1) {
		holder.addClass(visibleClass);
	} else {
		holder.removeClass(visibleClass);
	}
}

function initCheckDrop() {
	var drop = jQuery('.dropdown');
	var showClass = 'show-drop';
	var hiddenClass = 'hidden';
	var hiddenInput = jQuery('.create-block .form-control.team').parents('p');
	
	jQuery(drop.get().reverse()).each(function(index) {
		jQuery(this).css({zIndex: index + 1});
	});

	drop.each(function() {
		var newDrop = jQuery(this);
		var chks = newDrop.find('input:checkbox');

		// newDrop.find('.form-control').on('focus', function() {
		// 	jQuery(this).parents('.dropdown').addClass(showClass).siblings().removeClass(showClass);
		// });

		newDrop.find('.form-control').toggle( function() {
		 	jQuery(this).parents('.dropdown').addClass(showClass).siblings().removeClass(showClass);
		},
		function(){
			jQuery(this).parents('.dropdown').removeClass(showClass).siblings().removeClass(showClass);
		}
		);

		chks.each(function() {
			jQuery(this).on('change', function() {
				var input = jQuery(this).parents('.dropdown').find('.form-control');
				var arr = [];

				for (var i = 0; i < chks.length; i++) {
					var chk = chks.eq(i);
					var label = chk.siblings('.fake-label').text();

					if (chks.eq(i).prop('checked')) {
						arr.push(label);
					}
				}

				input.val(arr.join(', '));

				if (input.val().indexOf('independent') !== -1) {
					hiddenInput.addClass(hiddenClass);
				} else {
					hiddenInput.removeClass(hiddenClass);
				}
			});
		});
	});

	jQuery(window).on('click', function(e) {
		if (!jQuery(e.target).closest('.dropdown').length) {
			drop.removeClass(showClass);
		}
	});
}

function initLightBox() {
	var link = jQuery('a.lightbox');
	var holder = jQuery('#sign-popup');

	var removeLightbox = function() {
		holder.removeClass('visible');
	}

	link.each(function() {
		jQuery(this).on('click', function(e) {
			e.preventDefault();
			var lightboxTarget = jQuery(this).attr('href').slice(1);

			jQuery('div').each(function() {
				if(jQuery(this).attr('id') == lightboxTarget) {
					jQuery(this).addClass('visible');
				}
			});
		});
	});

	jQuery(document).on('click', '#sign-popup .close', function(e) {
		e.preventDefault();

		removeLightbox();
	});

	jQuery(document).on('click', '.overlay', function(e) {
		removeLightbox();
	});
}

// function initProjectsDrop() {
// 	var input = jQuery('.projects-list').siblings('p').find('.form-control');
// 	var holder = jQuery('.projects-list').parents('.projects-dropdown');
// 	var showClass = 'visible';

// 	input.on('focus', function() {
// 		holder.addClass(showClass);
// 	});

// 	jQuery('.projects-list a').each(function() {
// 		var text = jQuery(this).text();

// 		jQuery(this).on('click', function() {

// 			input.val(text);
// 			holder.removeClass(showClass);

// 			// input.bind('input',function(event) {
// 			// 	input.val(' ');
// 			// 	$(this).unbind(event);
// 			// });
// 		});

// 		jQuery(window).on('click', function(e) {
// 			if (!jQuery(e.target).closest('.form').length) {
// 				holder.removeClass(showClass);
// 			}
// 		});
// 	});
// }

function initMobileNav() {
	jQuery('#wrapper').mobileNav({
		hideOnClickOutside: true,
		menuActiveClass: 'active',
		menuOpener: '.opener',
		menuDrop: '#sidebar'
	});
}

function initDrop() {
	var holder = jQuery('.drop-holder')
	var drop = holder.find('.drop');
	var activeClass = 'active';

	jQuery(document).on('click', '.opener-holder', function(e) {
		e.preventDefault();

		holder.toggleClass(activeClass);
	});

	jQuery(document).on('click', function(e) {
		target = jQuery(e.target);
		if (!jQuery(e.target).closest(holder).length) {
			holder.removeClass(activeClass);
		}
	});
}

/*
 * Simple Mobile Navigation
 */
;(function($) {
	function MobileNav(options) {
		this.options = $.extend({
			container: null,
			hideOnClickOutside: false,
			menuActiveClass: 'nav-active',
			menuOpener: '.nav-opener',
			menuDrop: '.nav-drop',
			toggleEvent: 'click',
			outsideClickEvent: 'click touchstart pointerdown MSPointerDown'
		}, options);
		this.initStructure();
		this.attachEvents();
	}
	MobileNav.prototype = {
		initStructure: function() {
			this.page = $('html');
			this.container = $(this.options.container);
			this.opener = this.container.find(this.options.menuOpener);
			this.drop = this.container.find(this.options.menuDrop);
		},
		attachEvents: function() {
			var self = this;

			if(activateResizeHandler) {
				activateResizeHandler();
				activateResizeHandler = null;
			}

			this.outsideClickHandler = function(e) {
				if(self.isOpened()) {
					var target = $(e.target);
					if(!target.closest(self.opener).length && !target.closest(self.drop).length) {
						self.hide();
					}
				}
			};

			this.openerClickHandler = function(e) {
				e.preventDefault();
				self.toggle();
			};

			this.opener.on(this.options.toggleEvent, this.openerClickHandler);
		},
		isOpened: function() {
			return this.container.hasClass(this.options.menuActiveClass);
		},
		show: function() {
			this.container.addClass(this.options.menuActiveClass);
			if(this.options.hideOnClickOutside) {
				this.page.on(this.options.outsideClickEvent, this.outsideClickHandler);
			}
		},
		hide: function() {
			this.container.removeClass(this.options.menuActiveClass);
			if(this.options.hideOnClickOutside) {
				this.page.off(this.options.outsideClickEvent, this.outsideClickHandler);
			}
		},
		toggle: function() {
			if(this.isOpened()) {
				this.hide();
			} else {
				this.show();
			}
		},
		destroy: function() {
			this.container.removeClass(this.options.menuActiveClass);
			this.opener.off(this.options.toggleEvent, this.clickHandler);
			this.page.off(this.options.outsideClickEvent, this.outsideClickHandler);
		}
	};

	var activateResizeHandler = function() {
		var win = $(window),
			doc = $('html'),
			resizeClass = 'resize-active',
			flag, timer;
		var removeClassHandler = function() {
			flag = false;
			doc.removeClass(resizeClass);
		};
		var resizeHandler = function() {
			if(!flag) {
				flag = true;
				doc.addClass(resizeClass);
			}
			clearTimeout(timer);
			timer = setTimeout(removeClassHandler, 500);
		};
		win.on('resize orientationchange', resizeHandler);
	};

	$.fn.mobileNav = function(options) {
		return this.each(function() {
			var params = $.extend({}, options, {container: this}),
				instance = new MobileNav(params);
			$.data(this, 'MobileNav', instance);
		});
	};


}(jQuery));


jQuery(document).ready(function(){

	/*
	*	Styles select dropdown for step 2 create page
	*/
	window.addEventListener("hashchange", locationHashChanged());

	function locationHashChanged() {
	         if ( ( document.location.href.indexOf('step') > -1 ) || (document.location.href.indexOf('scene') > -1) ) {
	             jQuery('.select').niceSelect();
	        }

	        //adds active state to project menu item when on a sub level
	        if(document.location.href.indexOf('scene') > -1){
	        	jQuery('.menu-item-61').addClass('active');
	        }
	};




	/*
	*	FAQ page toggle answers
	*/
	jQuery('.q-title').on('click', function(){ 
            jQuery(this).siblings('.q-answer').slideToggle('fast');
            jQuery(this).find('.fa').toggleClass('fa-chevron-down');
    });



    /*
	*	Animation for marketing page
	*/
	var animation_elements = jQuery('.f-aminate');
     var windowW = jQuery(window);
        
     if(windowW.innerWidth() > 751) {  

        function check_if_in_view() {
              var window_height = windowW.height();
              var window_top_position = windowW.scrollTop();
              var window_bottom_position = (window_top_position + window_height);

            jQuery.each(animation_elements, function() {
	            var element = jQuery(this);
	            var element_height = element.outerHeight();
	            var element_top_position = element.offset().top;
	            var element_bottom_position = (element_top_position + element_height);

            	//check to see if this current container is within viewport
	            if ((element_bottom_position >= window_top_position) &&
	                (element_top_position <= window_bottom_position)) {
	              element.addClass('in-view');
	            } else {
	              element.removeClass('in-view');
	            }
        	});

        }//end check in view

    windowW.on('scroll resize', check_if_in_view);
    windowW.trigger('scroll'); 
    } 
});

    