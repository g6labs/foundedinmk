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

    $(document).on('click', '.btn-feature-startup', function() {
        var btn = $(this);
        var startup = btn.data('startup');

        $.ajax({
            type: 'get',
            url: btn.attr('href'),
            dataType: "json",
            success:function(data){

                //$("#action-message").html(data.message);
                //
                //$("#action-status").removeClass()
                //    .addClass('alert')
                //    .addClass('alert-dismissable')
                //    .addClass('alert-' + data.status)
                //    .show();

                btn = btn.children('i');

                if (btn.hasClass('glyphicon-star-empty')) {
                    btn.removeClass('glyphicon-star-empty');
                    btn.addClass('glyphicon-star');
                } else {
                    btn.removeClass('glyphicon-star');
                    btn.addClass('glyphicon-star-empty')
                }

            }
        });

        return false;
    });

    $(document).on('click', '.btn-approve-startup', function() {
        var confirmed = confirm('Are you sure? The submitter will be notified that the startup is approved.');
        var btn = $(this);

        if (confirmed) {

            $.ajax({
                type: 'get',
                url: btn.attr('href'),
                dataType: "json",
                success:function(data){

                    $("#action-message").html(data.message);

                    $("#action-status").removeClass()
                        .addClass('alert')
                        .addClass('alert-dismissable')
                        .addClass('alert-' + data.status)
                        .show();

                    $('.btn-approve-startup').hide();
                    $('.btn-decline-startup').hide();

                }
            });

        }

        return false;
    });

    $(document).on('click', '.btn-decline-startup', function() {
        var reason = prompt("Why are you declining the startup? The message will be sent to the submitter.", "");
        var btn = $(this);

        if (reason != null) {
            $.ajax({
                type: 'get',
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