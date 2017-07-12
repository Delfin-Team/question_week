@extends('layouts.master')

@section('content')
    <div class="row">

        <div class="row" style="margin-bottom: 10px;">
            <div class="col-xs-12 col-lg-6" style="margin-top: 15px;">


                <h2>Preguntas propuestas:</h2>
            </div>
            <div class="col-xs-12 col-lg-6">
                <well>¿Quieres proponer una pregunta para la siguiente semana?</well>
                <a href="{{route('questions.create')}}" class="btn btn-info">
                    <i class="fa fa-commenting-o" aria-hidden="true"></i>
                    Proponer
                </a>
            </div>
        </div>
            <!--questions-->
        @foreach($questions as $question)
            <div class="col-xs-12 col-md-6 col-lg-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">{{$question->title}} - </h3>
                    </div>
                    <div class="panel-body">
                        <p>

                        </p>
                        <p><strong>Creador:</strong> {{$question->user->email}}</p>
                        <p>Fecha de creación: {{$question->created_at}}</p>
                        <p>Votos hasta ahora: {{$question->votes}}</p>

                        {!!Form::model($question,['route'=>['addVote', $question->id],'method'=>'PUT'])!!}
                        <input type="submit" class="btn btn-success" value="votar">
                        {!!Form::close()!!}

                        <hr>
                        @if(!$question->AlreadyAnswered)
                            <a href="{{route('questions.show',$question)}}" class="btn btn-info">Contestar ahora</a>
                        @endif

                    </div>
                </div>
            </div>
        @endforeach

    </div>
    @endsection
