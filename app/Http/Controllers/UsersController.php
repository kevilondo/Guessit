<?php

namespace App\Http\Controllers;

use App\Users;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    //
    public function add_users(Request $request, $score)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required'
        ]);

        //check if the email already exists

        $user = Users::Where('email', $request->input('email'))->first();

        if (isset($user->email))
        {
           //take the current score and add it to the latest score
            if ($user->name == $request->input('name'))
            {

                $new_score = $score + $user->score;

                $user->update(array('score' => $new_score));
            }
            else
            {
                //this will prevent the user from signing up with the same email twice
                $this->validate($request, ['name' => 'unique:users', 'email' => 'unique:users']);
            }
        }
        else
        {
            $this->validate($request, ['name' => 'unique:users', 'email' => 'unique:users']);

            $users = new Users;

            $users->name = $request->input('name');

            $users->email = $request->input('email');

            $users->score = $score;

            $users->save();
        }



        $data = [
            'error_message' => "<div class='alert-warning'> Your informations have been submitted, you can access the leaderboard now </div>",
            'name' => $request->input('name'),
            'email' => $request->input('email')
        ];

        return $data;
    }
}
