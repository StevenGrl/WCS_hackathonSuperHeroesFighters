$(document).ready(function($){
    $('.thumbnail').click(function(){
        if ($('#player1').val()==''){
            image = $(this);
            $('#player1-image').attr('data',$(this).attr('id'));
            $('#player1-image').fadeOut( "slow", function() {
                // Animation complete
                $('#player1-image').attr('src',image.children().attr('src').replace('sm','md'));
                $('#player1-image').fadeIn( "slow", function() {});
            });
            $('#name1').fadeOut( "slow", function() {
                // Animation complete
                $('#name1').html(image.attr('data'));
                $('#name1').fadeIn( "slow", function() {});
            });



        } else if ($('#player2').val()=='') {
            image = $(this);
            $('#player2-image').attr('data',$(this).attr('id'));
            $('#player2-image').fadeOut( "slow", function() {
                // Animation complete
                $('#player2-image').attr('src',image.children().attr('src').replace('sm','md'));
                $('#player2-image').fadeIn( "slow", function() {});
            });
            $('#name2').fadeOut( "slow", function() {
                // Animation complete
                $('#name2').html(image.attr('data'));
                $('#name2').fadeIn( "slow", function() {});
            });
        }
    });

    $('#valid').click(function(){
        //Oui c'est caca je sais, mais on a plus qu'une heure
        if ($('#player1').val()=='' && $('#player1-image').attr('data')==''){

        } else if ($('#player1').val()==''){
            $('#player1').val($('#player1-image').attr('data'));
            $('#player1-image').removeClass('select-active');
            $('#player2-image').addClass('select-active');
            $('#valid').html('Valider<br>Joueur 2');
        } else if ($('#player2').val()=='' && $('#player2-image').attr('data')==''){

        } else if ($('#player2').val()==''){
            $('#player2').val($('#player2-image').attr('data'));
            $('#player1-image').addClass('select-active');
            $('#valid').html('FIGHT');
        } else {
            $('#form').submit();
        }
    })
});