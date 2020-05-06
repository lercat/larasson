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


            <!-- ici mon formulaire -->
                <div class="card mt-4">
                    <div class="card-header">Vos informations</div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <label for="nom">Votre nom</label>
                                <input name="sondage[nom]" type="text" class="form-control" id="nom" aria-describedby="nomHelp" placeholder="Entrez votre nom">
                                <small id="nomHelp" class="form-text text-muted">Bonjour, quel est ton nom ?</small>

                            @error('nom')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            </div>

                            <div class="form-group">
                            <label for="email">Votre E-mail</label>
                                <input name="sondage[email]" type="email" class="form-control" id="email" aria-describedby="emailelp" placeholder="Entrez votre E-mail">
                                <small id="emailHelp" class="form-text text-muted">Entrez votre adresse mail - Merci.</small>
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            </div>   
                            
                        <div>
                            <button class="btn btn-dark" type="submit">Questionnaire terminé</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
