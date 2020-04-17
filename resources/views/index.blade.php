@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-3">
                
            </div>

            <div class="col-md-6 home mt-4">
                <div class="card description card-default">
                    <div class="card-header">
                        Welcome to Guessit!
                    </div>

                    <div class="card-body">
                        <p> Play one of our quizzes and stand a chance to win Amazon gift cards!</p>

                        <p> Guessit! rewards users for having fun on our platform! <br>  

                            Compete with other players and finish in the top 3 to win a gift card.
                        </p>
                    </div>
                </div> <br>

                <div class="card card-default">
                    <div class="card-header">
                        Rules
                    </div>

                    <div class="card-body">
                        <ul>
                            <li class="a" id="s">You have 15 questions per game, and 10 seconds for each question</li><br>
                            <li class="a" id="k">You can play as much as you want and your score will be cumulated</li><br>
                            <li class="a" id="b">Only those who make it to the top 3 will be rewarded</li><br>
                            <li>In case of draw, the total prize will be shared equally among players</li><br>
                            <li>Players are rewarded every 2 weeks </li><br>
                        </ul>
                    </div>
                </div> <br>

                <div class="card card-default">
                    <div class="card-header">
                        Rewards
                    </div>

                    <div class="card-body">
                        <ul>
                            <li>
                                $25 Amazon gift card for the <b> first </b>
                                <img src="/assets/amazon_25$.png" alt="amazon-gift-card-25" height="20%" width="20%">
                            </li>

                            <li>
                                $10 Amazon gift card for the <b> second </b>
                                <img src="/assets/amazon_10$.png" alt="amazon-gift-card-10" height="30%" width="30%">
                            </li>

                            <li>
                                $5 Amazon gift card for the <b> third </b>
                                <img src="/assets/amazon_5$.png" alt="amazon-gift-card-5" height="30%" width="30%">
                            </li>
                        </ul>
                    </div>
                </div> <br>
            </div>
            <div class="col-md-3">
                
            </div>
        </div>
    </div>
@endsection