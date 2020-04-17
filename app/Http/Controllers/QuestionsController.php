<?php

namespace App\Http\Controllers;

use App\Question;

use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    //

    public function add_question(Request $request)
    {
        $this->validate($request, [
            'question' => 'required|unique:questions',
            'option1' => 'required',
            'option2' => 'required',
            'option3' => 'required',
            'option4' => 'required',
            'answer' => 'required',
            'category' => 'required'
        ]);

        $question = new Question;

        $question->question = $request->input('question');

        $question->option1 = $request->input('option1');

        $question->option2 = $request->input('option2');

        $question->option3 = $request->input('option3');

        $question->option4 = $request->input('option4');

        $question->answer = $request->input('answer');

        $question->category = $request->input('category');

        $question->save();

        return redirect('/home')->with(['success' => "A question has been added"]);
    }

    //once you choose a category, a question appears on the screen and it's selected randomly

    public function play($category)
    {
        $questions = Question::Where('category', $category)->inRandomOrder()->first();

        return view('pages.game')->with(['question' => $questions]);
    }

    //select question randomly after you answer to a question
    public function handle_ajax($category)
    {
        $questions = Question::Where('category', $category)->inRandomOrder()->first();

        return $questions;
    }

    //check if the answer is right
    public function check_answer(Request $request)
    {
        $question = Question::Where('question', $request->get('question'))->first();

        if ($question->answer == $request->get('answer'))
        {
            return 'right answer';
        }
        else
        {
            return 'wrong answer';
        }
    }
}
