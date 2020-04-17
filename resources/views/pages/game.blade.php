@extends('layout.app')

@section('content')
    <div id="game" class="container mt-4">
            {{ csrf_field() }}
        <p class="category">{{$question->category}}</p>
        <p id="question">Question <span id="question_number">1</span> </p>
        <p id="timer">10</p>
        <p> Score: <span id="score">0</span> </p>

        <div id="game_data" class="col">
            <div class="mt-5 col-md-12">
                <p class="question">{{$question->question}}</p>
            </div>

            <div class="row menu mb-5">
                <div>
                    <button id="option1" class="button">{{$question->option1}}</button>
                </div>

                <div>
                    <button id="option2" class="button">{{$question->option2}}</button>
                </div>

                <div>
                    <button id="option3" class="button">{{$question->option3}}</button>
                </div>

                <div>
                    <button id="option4" class="button">{{$question->option4}}</button>
                </div>
            </div>
        </div>
        <!-- The Modal -->
        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
          
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Game over</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                
                    <!-- Modal body -->
                    <div class="modal-body">
                        <p id="error-message"></p>
                        Your score is: <span id="modal-score"></span>
                        <p>Please, enter your name and your e-mail address</p>
                        <form id="user-details" method="post">
                            {{ csrf_field() }}
                            <p> Username: <input type="text" name="name" class="form-control" id="name"> </p>
                            <p> E-mail: <input type="email" name="email" id="email" class="form-control" required> </p>
                            <input type="submit" class="btn btn-primary" id="submit" value="Submit">
                        </form>
                    </div>
                
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" id="modal-close_btn" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
            
                </div>
            </div>
        </div>
    </div>
    <script src="{{URL::asset('js/game.js')}}"></script>
@endsection