(function ($) {

    $(document).on('click','.tabledata',function (e) {
        e.preventDefault();
        link = $(this);
        id = link.attr('data');
        $.ajax({
            url : api_var.ajaxurl,
            type: 'post',
            data: {
                action : 'apiuser_popup',
                nonce: api_var.nonce,
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
