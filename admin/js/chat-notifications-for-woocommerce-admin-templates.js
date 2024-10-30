(function( $ ) {
    'use strict';

    // wafwcChangeTemplate(jQuery('#wafwc-select-template'));

    /**
     * Popups closing btn and timeout
     *
     */
    var close = document.getElementsByClassName("wafwc-alert-closebtn");
    var i;

    for (i = 0; i < close.length; i++) {
        close[i].onclick = function(){
            var div = this.parentElement;
            div.style.opacity = "0";
            setTimeout(function(){ div.style.display = "none"; }, 600);
        }
    }

})( jQuery );

/**
 * Update fields on changing template select box
 *
 * @param el
 */
function wafwcChangeTemplate(el) {
    jQuery('#wafwc-varialbes-container').html('');
    jQuery('#wafwc-template-body-txt').val('');

    if (jQuery(el).find(':selected').data('body')) {
        let variables = /({{[1-9]}})+/g;
        let body = jQuery(el).find(':selected').data('body');
        jQuery('#wafwc-template-body-txt').val(body);

        if (body.match(variables)) {
            let numOfVar = body.match(variables).length;

            for (let i = 1; i <= numOfVar; i++) {
                let skel = jQuery('.wafwc-wc-elements-skeleton').clone();
                skel.removeClass('wafwc-wc-elements-skeleton');

                skel.find('label').html('Associate {{' + i + '}} to:');
                skel.find('select').attr('name','wafwc-template-var_'+i);
                skel.find('select').addClass('wafwc-select-group');
                skel.appendTo('#wafwc-varialbes-container');
                skel.show();

            }
        }
    }
}

/**
 * Ajax call for saving selected template's data
 *
 */
function wafwcSaveTemplateConfig() {

    let templateName = jQuery('#wafwc-select-template').val();
    let sendTo = jQuery('#wafwc-send-to').val();
    let templateLanguage = jQuery('#wafwc-select-template').find(':selected').data('language');
    let values = {};

    jQuery('select.wafwc-select-group').each(function (i){
        values[jQuery(this).attr('name')] = jQuery(this).val();
    })


    jQuery.ajax({
        url: wafwc_save_template_config.ajax_url,
        type: 'POST',
        data: {
            'action': 'wafwc_save_template_config',
            'data_options': values,
            'template_name': templateName,
            'template_language': templateLanguage,
            'send_to': sendTo
        },
        success: function (data) {
            wafwcShowSuccessNotification(data.data);
        },
        error: function (err) {
            wafwcShowAlertNotification('Something went wrong.');
        }
    });
}

/**
 * Popups visibility
 *
 */
function wafwcShowSuccessNotification(text) {
    jQuery('.wafwc-plugin-context .wafwc-alert.success .wafwc-success-popup-text').html(text);
    jQuery('.wafwc-plugin-context .wafwc-alert.success').show();
    setTimeout(function(){ jQuery('.wafwc-plugin-context .wafwc-alert.success').hide(); }, 2500);
}

function wafwcShowAlertNotification(text) {
    jQuery('.wafwc-plugin-context .wafwc-alert.alert .wafwc-alert-popup-text').html(text);
    jQuery('.wafwc-plugin-context .wafwc-alert.alert').show();
    setTimeout(function(){ jQuery('.wafwc-plugin-context .wafwc-alert').hide(); }, 2500);
}