<?php

namespace App\Http\Controllers;

use App\Questionnaire;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function create(Questionnaire $questionnaire)
    {
        return view('question.create', compact('questionnaire'));
    }

    public function store(Questionnaire $questionnaire)
    {

        $data = request()->validate([
            'question.question' => 'required',
            'reponses.*.reponse' => 'required',
        ]);

        $question = $questionnaire->questions()->create($data['question']);
        $question->reponses()->createMany($data['reponses']);

        return redirect('/questionnaires/'.$questionnaire->id);

    }
}
