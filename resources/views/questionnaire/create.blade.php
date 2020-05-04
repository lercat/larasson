@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
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
