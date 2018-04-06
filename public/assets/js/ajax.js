$(function () {

    $('#content').on('submit', 'form', function (e) {
        e.preventDefault();
        var $form = $(this);
        $.ajax({
            type: "POST",
            url: '/play',
            data: $form.serialize(),
            success: function (data) {

                var newContent = $($.parseHTML(data)).filter("#content");
                if (newContent.length == 0) {
                    location.reload();

                } else {
                    $(document).find('#content').html(newContent.children());

                }


            },

        });


    });


});