@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $questionnaire->titre }}</div>

                <div class="card-body">
                    <a class="btn btn-dark" href="/questionnaires/{{ $questionnaire->id }}/questions/create">Ajouter une question</a>
                    <a class="btn btn-dark" href="/sondages/{{ $questionnaire->id}}-{{ Str::slug($questionnaire->titre) }}">Répondre à l'enquête</a>
                </div>
            </div>

            @foreach($questionnaire->questions as $question)
                <div class="card mt-4">
                    <div class="card-header">{{ $question->question }}</div>

                    <div class="card-body">
                        <ul class="list-group">
                            @foreach($question->reponses as $reponse)
                                <li class="list-group-item">{{ $reponse->reponse }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endforeach

            {{-- <div class="card-footer">
                <form action="/questionnaires/{{ $questionnaire->id }}/questions/{{ $question->id }}" method="post">
                    @method('DELETE')
                    @csrf

                    <button type="submit" class="btn-sm btn-outline-danger">Supprimer le sondage</button>
                </form>
            </div> --}}

        </div>
    </div>
</div>
@endsection
