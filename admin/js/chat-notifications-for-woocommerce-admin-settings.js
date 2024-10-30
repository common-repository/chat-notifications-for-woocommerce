(function( $ ) {
    'use strict';

    // TODO
    $("#my-btn").on("click",  function (e) {
        $.ajax({
            url: wafwc_save_new_template.ajax_url,
            type: 'POST',
            data: {
                'action': 'wafwc_save_new_template'
            },
            beforeSend: function () {

            },
            success: function (data) {

                console.log(data);

            },
        });
    });

})( jQuery );