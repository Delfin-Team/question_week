@extends('layouts.master')

@section('content')
    <h1 class="text-center">{{$question->title}}</h1>
    <div class="row">

        <div class="col-xs-6 col-xs-offset-3">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title text-center">Elige una respuesta</h3>
                </div>
                <div class="panel-body text-center">
                    <form action="{{route('addVote',$question->id)}}" method="POST">
                        {{csrf_field()}}
                        @foreach($answers as $answer)
                            <div class="radio">
                                <label>
                                    <input type="radio" name="answer" id="{{$answer->id}}" value="{{$answer->id}}" >
                                    {{$answer->description}}
                                </label>
                            </div>
                        @endforeach
                        <input type="submit" value="Responder" class="btn btn-success">
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection