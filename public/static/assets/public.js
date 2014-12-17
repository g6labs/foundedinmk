$(function() {

    $(document).on('click', '.btn-submit-startup', function () {
        var btn = $(this);

        $.ajax({
            type: 'post',
            url: btn.attr('href'),
            dataType: "json",
            data: {
                name: $('#name').val(),
                founded: $('#founded').val(),
                url: $('#url').val(),
                twitter: $('#twitter').val(),
                logo_url: $('#logo_url').val(),
                contact_name: $('#contact_name').val(),
                contact_email: $('#contact_email').val()
            },
            success: function (data) {

                alert(data.message);

            }
        });

        return false;
    });

});