$(document).ready(function(){

    //timer
    var time = 10;

    //category
    var category = $(".category").html();

    //score
    var score = 0;

    //question number
    var question_number = $("#question_number").html();

    $('#timer').html(time);

    function countdown()
    {
        time--;
        if (time == -1)
        {

            clearInterval(timer);

            //send ajax request when the time's up to go to the next question
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: "/play/"+category+'/next',
                method: "GET",
                data: {category:category, _token:_token},
                success: function(result)
                {
                    $('.question').html(result.question);
                    $('#option1').html(result.option1);
                    $('#option2').html(result.option2);
                    $('#option3').html(result.option3);
                    $('#option4').html(result.option4);

                    //enable buttons
                    $('.button').attr('disabled', false);

                    time = 11;
                    question_number++;
                    $('#question_number').html(question_number);

                    timer = setInterval(countdown, 1000);

                    if (question_number > 2)
                    {
                        finish_game();
                    }

                }
            })
        }
        else
        {
            $('#timer').html(time);
        }
    }

    $('.button').click(function(){

        $.ajax({
            url: "/answer",
            method: "GET",
            data: {question:$('.question').html(), answer:$(this).html()},
            success: function(result)
            {
                if (result == 'right answer')
                {
                    time = 0;
                    score += 10;
                    $('#score').html(score);
                    $('#question_number').html(question_number);
                }
                else
                {
                    time = 0;
                    $('#question_number').html(question_number);
                }
            }
        })
        //disable buttons
        $('.button').attr('disabled', true);
    });

    //once the user has answered to all the questions
    function finish_game()
    {

        score = $("#score").html();

        $("#modal-score").html(score);

        $('#question').html(
            "<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#myModal'>Click to continue!</button>"
        );

        $('#game_data').css('display', 'none');
        $('#timer').css('display', 'none');
    }

    //submit the form
    $("#user-details").submit(function(e){

        e.preventDefault();

        var score = $("#modal-score").html();

        var form = $(this);
        var url = "/user-form-submit/" + score;
        var method = form.attr('method');

        $.ajax({
            
            url:url,
            method: method,
            data: form.serialize(),
            success: function(result)
            {
                console.log(result);
                $('#error-message').html(result.error_message);
                $("#modal-close_btn").css('display', 'none');
                $('.modal-footer').html(
                    "<a href='/leaderboard/"+ result.name + "'" + "class='btn btn-primary'>" + "See the leaderboard </a>"
                );
            },

            error: function(xhr)
            {
                if (xhr.status == 422)
                {
                    var errors = JSON.parse(xhr.responseText);
                   
                    $.each(errors, function (){
                        alert(this[0]);
                    })
                }
            }
        })
    })

    timer = setInterval(countdown, 1000);

    $(document).bind("contextmenu",function(e){
        return false;
     });

     $(document).keydown(function(event){
        console.log(event.keyCode);
        if (event.keyCode == 123 || event.ctrlKey)
        {
            console.log(event.keyCode);
            return false;
        }
     })

})