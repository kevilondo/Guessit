$(document).ready(function(){

    $('#option1').keyup(function(event){

        var option1 = $('#option1').val();

        $('#answer1').val(option1);

        $('#answer1').html(option1);
    })

    $('#option2').keyup(function(event){
        
        var option2 = $('#option2').val();

        $('#answer2').val(option2);

        $('#answer2').html(option2);
    })

    $('#option3').keyup(function(event){
        
        var option3 = $('#option3').val();

        $('#answer3').val(option3);

        $('#answer3').html(option3);
    })

    $('#option4').keyup(function(event){
        
        var option4 = $('#option4').val();

        $('#answer4').val(option4);

        $('#answer4').html(option4);
    })

})