<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Users;

class PagesController extends Controller
{
    //
    public function index()
    {
        return view('index');
    }

    public function play()
    {
        return view('pages.play');
    }

    public function contact()
    {
        return view('pages.contact');
    }


    public function leaderboard($username)
    {

        //this is the leaderboard with the current user's score and rank at the top

        if ($username !== "all")
        {
            //get all users
            $all_users = Users::orderBy('score', 'desc')->get();
            //get all the users and rank them

            $users = Users::orderBy('score', 'desc')->get()->take(50);

            //get the rank of the user who just played the game

            $number_of_users = count($users);
            //loop through the collection of users, once we find the user passed on the url, we fetch his score and rank him
            for ($i = 0; $i < $number_of_users; $i++)
            {
                if ($all_users[$i]->name == $username)
                {
                    $rank = $i + 1;
                    $score = $all_users[$i]->score;
                }
            }

            //this variable will be used in the view to rank users
            $user_rank = 1;

            return view('pages.leaderboard')->with(["users" => $users, "rank" => $rank, "score" => $score, "user_rank" => $user_rank]);
        }

        //this is just a simple leaderboard

        else
        {
            $users = Users::orderBy('score', 'desc')->get()->take(50);

            //this variable will be used in the view to rank users
            $user_rank = 1;

            return view('pages.leaderboard')->with(["users" => $users, "user_rank" => $user_rank]);
        }
    }

    public function privacy_policy()
    {
        return view('pages.privacy');
    }
}
