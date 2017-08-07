jQuery(function(){

    /*
    *   Enable edit mode on single scene
    */
    jQuery('#edit-scene').click(function(e){
        jQuery(this).hide();
        jQuery('#save-scene').show();

        jQuery('.edit-text-lbl').hide();
        jQuery('.edit-text-inpt').show();

        e.preventDefault();
        return false;
    });

    /*
    *   Save single scene
    */
    jQuery('#save-scene').click(function(e){
        jQuery(this).hide();
        jQuery('#edit-scene').show();

        jQuery.ajax({
            type: "POST",
            url: "",
            data: jQuery('#scene-edit-form').serialize(),
            dataType: 'json',
            success: function(return_value){

                console.log(return_value);

                for (var key in return_value) {
                    if(key == 'content'){
                        jQuery('[for="edit-notes-text"]').text( return_value[key] );
                        jQuery('#edit-notes-text').val( return_value[key] );
                    }
                    if(key == 'excerpt'){
                        jQuery('[for="edit-scene-text"]').text( return_value[key] );
                        jQuery('#edit-scene-text').val( return_value[key] );
                    }
                }

            }
        });

        jQuery('.edit-text-inpt').hide();
        jQuery('.edit-text-lbl').show();

        e.preventDefault();
        return false;
    });

    jQuery('#upgradeplan-popup').click(function(e){
        jQuery(this).attr( 'href', jQuery('#producllist input[type=radio]:checked').val() );
    });

    //adds active state to account-settings menu links when on sub-level
    if(jQuery('.woocommerce-view-order').length > 0){
    	jQuery('.woocommerce-MyAccount-navigation-link--orders').addClass('is-active');
    }

    if(jQuery('.woocommerce-add-payment-method').length > 0){
    	jQuery('.woocommerce-MyAccount-navigation-link--payment-methods').addClass('is-active');
    }

    if(jQuery('.woocommerce-edit-address').length > 0){
        jQuery('.woocommerce-MyAccount-navigation-link--edit-addressbilling').addClass('is-active');
    }

    //1.woocommerce replace * with "required"
    jQuery('.required').text('required');

    //2.remove .00 decimals for the prices-only on this popup
    if ( jQuery('#upgrade-popup').length > 0){

        var price = jQuery('.woocommerce-Price-amount');

        jQuery(price).each( function()
        {

            var priceText = String(jQuery(this).text());

            //just counting the last num for substr
            var priceNumOfChar = priceText.length;
            var priceNoZero = priceNumOfChar - 3;

            //cutting the string
            var result = priceText.substr(0, priceNoZero );

            jQuery(this).text(result);

        });
    }

    //5.FAQ page tab navigation
    jQuery('#q-themes a').click(function (e) {
      e.preventDefault()
      jQuery(this).tab('show')
    })

    //in my account, Billing information, adds a little info sign at the end with a pop up
    if (jQuery('.woocommerce-MyAccount-navigation-link--edit-addressbilling').length == 1) {
        jQuery('.woocommerce-MyAccount-navigation-link--edit-addressbilling').append('<span class="info">&#x00130;</span>');
        jQuery('.info').on('hover', function(){
            jQuery('.tooltiptext').remove();
            jQuery('.info').append('<div class="tooltiptext">This is optional \n Shows only in invoices</div>').show();
        });

        jQuery('.info').on('mouseout', function(){
            jQuery('.tooltiptext').remove();
        })
    }


});

//4. autocomplete as you type for "create a project" popup
function popupDropdpwnCreate(){
    if( jQuery('#input-autocomplete').length == 1){
        var inputA = document.getElementById("input-autocomplete");
        var dynamicDropdown = new Awesomplete(inputA, { list: document.getElementById("mylist"),
                                                       //minChars: 2
                                                      }
                                              );
    }

    Awesomplete.$(inputA).addEventListener("focus", function() {
        if (dynamicDropdown.ul.childNodes.length === 0) {
            dynamicDropdown.minChars = 0;
            dynamicDropdown.evaluate();
        }
        else if (dynamicDropdown.ul.hasAttribute('hidden')) {
            dynamicDropdown.open();
        }
        else {
            dynamicDropdown.close();
            dynamicDropdown.minChar = 2;
        }
    });
}

 document.addEventListener("DOMContentLoaded", function() {

    if( jQuery('#input-autocomplete').length == 1){
         popupDropdpwnCreate();
    }
});

//create page popup asking if you want to leave
    //if on create page
// window.addEventListener("hashchange", function(){
//     if ( ( window.location['href'].indexOf('?') > -1 ) && ( ( window.location['href'].indexOf('create') > -1 ) ) ){
//         createPagePopup();
//     }

// }, false);

// window.addEventListener("hashchange", function(){
//     if ( ( window.location['href'].indexOf('step=') > -1 ) ){
//         //createPagePopup();
//         alert('hash changed');
//     }

// });


// if ("onhashchange" in window) {
//     alert("The browser supports the hashchange event!");
// }

function locationHashChanged() {
    if ( window.location['href'].indexOf('step') > -1 ){
        createPagePopup();
    }
}

locationHashChanged();

window.addEventListener("hashchange", locationHashChanged);

function createPagePopup(){
    var visibleClass = 'visible';
    var links = jQuery('#sidebar, .logo, .drop').find('a');

    jQuery.each(links, function(){

        jQuery(this).on('click', function(target){
            var targetDest = jQuery(this).attr('href');
            var inputDontShowAgain = document.getElementById('dont-show-again');
            var inputValueStored = localStorage.getItem('dont-show-again');

                if (inputValueStored == 'checked') {

                    // jQuery(links).unbind('on');
                    //alert('unbined worked');
                    // //target.stopPropagation();
                    // //return true;
                }
                else
                {
                    target.preventDefault();
                    //alert( 'if showdialog true' + target.isDefaultPrevented() );
                    jQuery('#goodtogo-popup').addClass(visibleClass);

                    //click on green
                    jQuery('#goodtogo-popup .green').on('click', function(){
                        jQuery(this).attr('href', targetDest);
                        jQuery('#goodtogo-popup').removeClass(visibleClass);
                    });

                    //click on gray
                    jQuery('#goodtogo-popup .delete, #goodtogo-popup .close').on('click', function(e){
                        e.preventDefault();
                        jQuery('#goodtogo-popup').removeClass(visibleClass);
                    });

                    inputDontShowAgain.addEventListener('click', function(){
                        jQuery(this).is(':checked');
                        //alert('unbined worked');
                        inputValueStored = localStorage.setItem('dont-show-again', 'checked');
                    })
                }
        });
    });
} //end function createPagePopup
