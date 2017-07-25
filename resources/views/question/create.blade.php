@extends('layouts.master')

@section('content')
  <h1 class="text center">Proponer...</h1>
  <div class="container" id="main">
    <!-- Page Content goes here -->
   <div class="row">
    <form class="col s12" action="{{route('questions.store')}}" method="POST">
      {{ csrf_field() }}
      <div class="row">
         <div class="input-field col s12 ">
          <i class="material-icons prefix">insert_emoticon</i>
          <input id="icon_prefix" type="text" class="validate" v-model="titleQuestion" name="title">
          <label for="icon_prefix">Titulo:</label>
        </div>

        <h3 class="text center">Posibles respuestas</h3>
        <div class="input-field col s12 xl4 m12">
          <i class="material-icons prefix">local_activity</i>
          <input id="icon_prefix" type="text" class="validate" v-model="answer1Question" name="answer1">
          <label for="icon_prefix">Respuesta 1</label>
        </div>
        <div class="input-field col s12 xl4 m12">
          <i class="material-icons prefix">local_activity</i>
          <input id="icon_telephone" type="tel" class="validate" v-model="answer2Question" name="answer2">
          <label for="icon_telephone">Respuesta 2</label>
        </div>
        <div class="input-field col s12 xl4 m12">
          <i class="material-icons prefix">local_activity</i>
          <input id="icon_telephone" type="tel" class="validate" v-model="answer3Question" name="answer3">
          <label for="icon_telephone">Respuesta 3</label>
        </div>
      </div>
    </form>
  </div>
  <div class="center-align">
    <button class="btn waves-effect waves-light" type="submit" v-on:click="addQuestion" v-if="titleQuestion" >Enviar
            <i class="material-icons right">send</i>
        </button>
  </div>

  </div>

    @endsection
