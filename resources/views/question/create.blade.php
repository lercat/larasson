@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Créer une nouvelle question</div>

                <div class="card-body">
                    <form action="/questionnaires/{{ $questionnaire->id }}/questions" method="post">
                        @csrf
                        <div class="form-group">
                          <label for="question">Question</label>
                            <input name="question[question]" type="text" class="form-control" 
                                    value="{{ old('question.question')}}"
                                    id="question" aria-describedby="questionHelp" placeholder="Entrez la question">
                            <small id="questionHelp" class="form-text text-muted">Posez des questions simples et pertinentes pour obtenir un meilleur résultat !</small>

                          @error('question.question')
                            <small class="text-danger">{{ $message }}</small>
                          @enderror
                        </div>

                        <div class="form-group">
                            <fieldset>
                                <legend>Quel sera votre choix ?</legend>
                                <small id="choixHelp" class="form-text text-muted">Donnez des choix qui permettent de mieux comprendre votre question !</small>

                                <div>
                                    <div class="form-group">
                                        <label for="reponse1">Choix 1</label>
                                        <input name="reponses[][reponse]" type="text"
                                                value="{{ old('reponses.0.reponse')}}"
                                                class="form-control" id="reponse1" aria-describedby="choixHelp" placeholder="Entrez votre choix 1">
                                        
                                        @error('reponses.0.reponse')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror        
                                    </div>
                                </div>

                                <div>
                                    <div class="form-group">
                                        <label for="reponse2">Choix 2</label>
                                        <input name="reponses[][reponse]" type="text"
                                                value="{{ old('reponses.1.reponse')}}"
                                                class="form-control" id="reponse2" aria-describedby="choixHelp" placeholder="Entrez votre choix 2">
                                        
                                        @error('reponses.1.reponse')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror        
                                    </div>
                                </div>

                                <div>
                                    <div class="form-group">
                                        <label for="reponse3">Choix 3</label>
                                        <input name="reponses[][reponse]" type="text"
                                                value="{{ old('reponses.2.reponse')}}"
                                                class="form-control" id="reponse3" aria-describedby="choixHelp" placeholder="Entrez votre choix 3">
                                        
                                        @error('reponses.2.reponse')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror        
                                    </div>
                                </div>

                                <div>
                                    <div class="form-group">
                                        <label for="reponse4">Choix 4</label>
                                        <input name="reponses[][reponse]" type="text"
                                                value="{{ old('reponses.3.reponse')}}"
                                                class="form-control" id="reponse4" aria-describedby="choixHelp" placeholder="Entrez votre choix 4">
                                        
                                        @error('reponses.3.reponse')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror        
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        
                        
                          <button type="submit" class="btn btn-primary">Ajouter la question</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
