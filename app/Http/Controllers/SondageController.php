<?php

namespace App\Http\Controllers;

use App\Questionnaire;
use Illuminate\Http\Request;

class SondageController extends Controller
{
    public function show(Questionnaire $questionnaire, $slug)
    {
        $questionnaire->load('questions.reponses');
        return view('sondage.show', compact('questionnaire'));
    }

    public function store(Questionnaire $questionnaire)
    {
        $data = request()->validate([
            'entreeReponse.*.reponse_id' => 'required',
            'entreeReponse.*.question_id' => 'required',
            'sondage.nom' => 'required',
            'sondage.email' => 'required|email'
        ]);

        $sondage = $questionnaire->sondages()->create($data['sondage']);
        $sondage->reponses()->createMany($data['entreeReponse']);
       // dd(request()->all());

       return 'Merci beaucoup';
    }

}
