(function ($) {

    $(document).on('click','.tabledata',function (e) {
        e.preventDefault();
        link = $(this);
        id = link.attr('data');
        $.ajax({
            url : dcms_vars.ajaxurl,
            type: 'post',
            data: {
                action : 'dcms_ajax_readmore',
                nonce: dcms_vars.nonce,
                id_post:id
            },
            beforeSend: function(){
                $('#resp-ajax').addClass('open');
                $('#resp-ajax').html('loading...');
            },
            success: function (resultado) {         
                $('#resp-ajax').html(resultado);
            }
        });
    });
    $(document).on('click','#close_popup',function (e) {
        e.preventDefault();
        $('#resp-ajax').removeClass('open');
    });
})(jQuery);
