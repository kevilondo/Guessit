@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <form action="" method="post">
                        {{ csrf_field() }}

                        <p>Question: <textarea name="question" id="question" class="form-control" cols="30" rows="4"></textarea> </p>

                        <p>Option 1: <input type="text" class="form-control" name="option1" id="option1"></p>

                        <p>Option 2: <input type="text" name="option2" id="option2" class="form-control"></p>

                        <p>Option 3: <input type="text" name="option3" id="option3" class="form-control"></p>

                        <p>Option 4: <input type="text" name="option4" id="option4" class="form-control"></p>

                        <p> Answer: 
                        <select class="form-control" name="answer" id="answer">
                            <option id="" value="">Select an answer</option>
                            <option id="answer1" value=""></option>
                            <option id="answer2" value=""></option>
                            <option id="answer3" value=""></option>
                            <option id="answer4" value=""></option>

                        </select> </p>

                        <p> Category:
                        <select class="form-control" name="category" id="category">
                            <option value="Gaming">Gaming</option>
                            <option value="Movies">Movies</option>
                            <option value="Series">Series</option>
                            <option value="Animes">Animes/Mangas</option>
                            <option value="History">History</option>
                            <option value="Geography">Geography</option>
                            <option value="Music">Music</option>
                            <option value="Sport">Sport</option>
                        </select> </p>

                       <p> <input class="form-control btn btn-primary" type="submit" name="submit" value="Submit"> </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
