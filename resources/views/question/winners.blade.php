@extends('layouts.master')
@section('content')
  <h1 class="center-align">Preguntas ganadoras</h1>

    <div class="row">
  	 <div class="col s6 offset-s3 ">
  	  @foreach ($questions as $question)
        <div class="card small">
    	    <div class="card-image waves-effect waves-block waves-light">
    	      <img class="activator" src="https://lorempixel.com/250/250/nature/1">
    	    </div>
    	    <div class="card-content">
    	      <span class="card-title activator grey-text text-darken-4">{{$question->title}}<i class="material-icons right">keyboard_arrow_up</i></span>
    	      <p><a href="{{route('showGraphsVotes',$question->id)}}">Ver estadistica</a></p>
    	    </div>
    	    <div class="card-reveal">
    	      <span class="card-title grey-text text-darken-4">Pregunta ganadora<i class="material-icons right">close</i></span>
    	      <p>creada en la semana: {{$question->created_at->diffForHumans()}}</p>

    	      @foreach ($question->answers as $answer)
              <p>{{$answer->description}} : {{$answer->votes}} Votos</p>
    	      @endforeach
    	    </div>
    	  </div>
  	  @endforeach
  	 </div>
	</div>

@endsection
