$(function() {

    $(document).on('click', '.btn-join-form', function () {
        $("#join-form").slideDown('slow');

        return false;
    });

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

                if (data.status == 'success') {
                    $("#join-form").slideUp('slow');
                    $("#join-msg").html("Thank you! Your startup was added to the list but needs to be approved before showing here.")
                } else {
                    $("#join-msg").html("Please check your data and resubmit the form.");
                }

            }
        });

        return false;
    });

});