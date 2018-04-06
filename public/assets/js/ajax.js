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

                    $('#play-vs').html(newContent.find('#play-vs').children())
                    $('#play-attacks').html(newContent.find('#play-attacks').children())

                    $('#play-progress1').css('width', newContent.find('#play-progress1').css('width'));
                    $('#play-progress2').css('width', newContent.find('#play-progress2').css('width'));

                    $('#play-energy1').css('width', newContent.find('#play-energy1').css('width'));
                    $('#play-energy2').css('width', newContent.find('#play-energy2').css('width'));

                }


            },

        });


    });


});