@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $questionnaire->titre }}</div>

                <div class="card-body">
                    <a class="btn btn-dark" href="/questionnaires/{{ $questionnaire->id }}/questions/create">Ajouter une question</a>

                </div>
            </div>

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
