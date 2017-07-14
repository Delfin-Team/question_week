@extends('layouts.master')

@section('content')
    <div class="row">
      <h1 class="text-center text-danger">
        <i class="fa fa-star-o"></i>
        Pregunta de la semana:</h1>
      <div class="col-xs-4 col-xs-offset-4">
          <div class="panel panel-primary">
              <div class="panel-heading ">
                  <h3 class="panel-title">{{$theWinner->title}} - </h3>
              </div>
              <div class="panel-body">
                  <p><strong>
                    <i class="fa fa-user-circle"></i>
                    Creador:</strong> {{$theWinner->user->email}}</p>
                  <p>
                    <i class="fa fa-clock-o"></i>
                    Creado: {{$theWinner->created_at->diffForHumans()}}</p>
                  <p>
                    <i class="fa fa-thumbs-up"></i>
                    Votos:

                    <strong class="text-success">{{$theWinner->votes}}</strong></p>
                    <hr>
                    @if (!$theWinner->AlreadyAnswered)
                        <a href="{{route('questions.show',$theWinner)}}" class="btn btn-info">Contestar ahora</a>
                    @endif
                    <a class="btn" href="{{route('showGraphsVotes',$theWinner->id)}}">
                      <i class="fa fa-eye fa-lg"></i> Ver votos de respuestas
                    </a>

              </div>
          </div>
      </div>
    </div>


    <div class="row">
        <div class="row" style="margin-bottom: 10px;">
            <div class="col-xs-12 col-lg-6" style="margin-top: 15px;">
                <h2>Preguntas propuestas:</h2>
            </div>
        </div>
    </div>

    <div class="row">
          <!--questions-->
      @foreach($questions as $question)
          <div class="col-xs-12">
              <div class="panel panel-primary">
                  <div class="panel-heading">
                      <h3 class="panel-title">{{$question->title}} - </h3>
                  </div>
                  <div class="panel-body">
                      <p><strong>
                        <i class="fa fa-user-circle"></i>
                        Creador:</strong> {{$question->user->email}}</p>
                      <p>
                        <i class="fa fa-clock-o"></i>
                        Creado: {{$question->created_at->diffForHumans()}}</p>
                      <p>
                        <i class="fa fa-thumbs-up"></i>
                        Votos hasta ahora:

                        <strong class="text-success">{{$question->votes}}</strong></p>
                      @if (!$question->AlreadyVote)
                        {!!Form::model($question,['route'=>['addVote', $question->id],'method'=>'PUT'])!!}
                          <input type="submit" class="btn btn-success" value="votar">
                        {!!Form::close()!!}
                      @endif


                      <hr>

                  </div>
              </div>
          </div>
      @endforeach
    </div>
    @endsection
