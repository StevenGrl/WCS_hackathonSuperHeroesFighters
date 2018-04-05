$(document).ready(function($){
    $('.thumbnail').click(function(){
        if ($('#player1').val()==''){

            $('#player1-image').attr('src',$(this).children().attr('src').replace('sm','md'));
            $('#name1').html($(this).attr('data'));
            $('#player1-image').attr('data',$(this).attr('id'));
        } else if ($('#player2').val()=='') {
            $('#player2-image').attr('src',$(this).children().attr('src').replace('sm','md'));
            $('#name2').html($(this).attr('data'));
            $('#player2-image').attr('data',$(this).attr('id'));
        }
    });

    $('#valid').click(function(){
        if ($('#player1').val()==''){
            $('#player1').val($('#player1-image').attr('data'));
        } else if ($('#player2').val()==''){
            $('#player2').val($('#player2-image').attr('data'));
            $('#valid').html('FIGHT');
        } else {
            $('#form').submit();
        }
    })
});