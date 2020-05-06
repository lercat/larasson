@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>{{ $questionnaire->titre }}</h1>

            <form action="/sondages/{{ $questionnaire->id }}-{{ Str::slug($questionnaire->titre) }}" method="post">
                @csrf
                <!-- ici on a chacune de nos questions avec un numéro $key -->
                @foreach($questionnaire->questions as $key => $question)
                <div class="card mt-4">
                    <div class="card-header"> <strong class="mr-2">{{ $key + 1 }}</strong> {{ $question->question }}</div>

                    <div class="card-body">

                        @error('entreeReponse.' . $key . '.reponse_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        <ul class="list-group">
                            @foreach($question->reponses as $reponse)
                               <label for="reponse{{ $reponse->id }}"><!--rajout label pour cliquer partout ds le champ-->
                                    <li class="list-group-item">
                                        <input type="radio" name="entreeReponse[{{ $key }}][reponse_id]" id="reponse{{ $reponse->id }}"
                                            {{ (old('entreeReponse.' . $key . '.reponse_id') == $reponse->id) ? 'checked' : ''}}
                                            class="mr-2" value="{{ $reponse->id }}">
                                        {{ $reponse->reponse }}

                                        <input type="hidden" name="entreeReponse[{{ $key }}][question_id]" value="{{ $question->id }}">
                                        <!-- on doit connaître à quelle question les réponses appartiennent-->
                                    </li>
                               </label>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endforeach

                <button class="btn btn-dark" type="submit">Questionnaire terminé</button>
            </form>


            <!-- ici mon créer un sondage-->
            <div class="card">
                <div class="card-header">Créer un sondage</div>

                <div class="card-body">
                    <form action="/questionnaires" method="post">
                        @csrf
                        <div class="form-group">
                          <label for="titre">Titre</label>
                            <input name="titre" type="text" class="form-control" id="titre" aria-describedby="titreHelp" placeholder="Entrez le titre de votre sondage">
                            <small id="titreHelp" class="form-text text-muted">Donnez à votre questionnaire un titre attrayant.</small>

                          @error('titre')
                            <small class="text-danger">{{ $message }}</small>
                          @enderror
                        </div>

                        <div class="form-group">
                          <label for="objectif">Objectif</label>
                            <input name="objectif" type="text" class="form-control" id="objectif" aria-describedby="objectfHelp" placeholder="Entrez l'objectif">
                            <small id="objectifHelp" class="form-text text-muted">Donner un but qui augmentera les réponses.</small>
                          @error('objectif')
                            <small class="text-danger">{{ $message }}</small>
                          @enderror
                          </div>
                          <button type="submit" class="btn btn-primary">Créer le questionnaire</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
