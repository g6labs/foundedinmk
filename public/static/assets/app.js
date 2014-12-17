$(function(){

    $(document).on('click', '.btn-delete-startup', function() {
        var confirmed = confirm('Are you sure?');
        var btn = $(this);
        var startup = btn.data('startup');

        if (confirmed) {

            $.ajax({
                type: 'delete',
                url: btn.attr('href'),
                dataType: "json",
                success:function(data){

                    $("#action-message").html(data.message);

                    $("#action-status").removeClass()
                        .addClass('alert')
                        .addClass('alert-dismissable')
                        .addClass('alert-' + data.status)
                        .show();

                    btn.closest('tr').slideUp('slow');

                }
            });

        }

        return false;
    });


});