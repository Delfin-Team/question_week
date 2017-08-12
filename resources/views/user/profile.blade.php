@extends('layouts.master')
@section('extr-css')
  <style >
  .fade-enter-active, .fade-leave-active {
    transition: opacity .5s
    }
    .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
    opacity: 0
    }
  </style>
@endsection
@section('content')
<div class="row" id="userProfile" style="margin-top:15px;">
  <div class="col s12 m4">
    <img src="{{asset('images/user.png')}}" class="responsive-img">
    <p class="center-align">
      @{{user.name}} - @{{user.email}} <hr>
      Usuario desde: @{{user.created_at}}
    </p>
    <div class="collection">
    <a v-on:click="show = true" class="collection-item" id="btnGroups">
    <i class="material-icons">group_work</i>

    Grupos</a>
    <a v-on:click="show = false" class="collection-item" id="btnQuestions">
    <i class="material-icons">announcement</i>
    Preguntas propuestas</a>

    </div>
  </div>

<!-- Modal Structure -->
  <div id="modal1" class="col s12 m8" >
    <h4 v-if="show">Mis grupos</h4>
    <transition name="fade">

    <ul class="collection" v-if="show">

          <li class="collection-item avatar" v-for="group in user.groups">
            <img src="{{asset('/images/groups.png')}}" alt="" class="circle">
            <span class="title">@{{group.name}}</span>
            <p v-if="group.private">
              Grupo privado
            </p>
            <p v-else>
              Grupo publico
            </p>
            <a v-bind:href="'groups/' + group.id" class="secondary-content"><i class="material-icons">call_made</i></a>
          </li>


    </ul>
  </transition >
  </div>
  <div id="modal2" class="col s12 m8" >
    <div>
      <h4 v-if="!show">Ultimas Preguntas propuestas</h4>
    <transition name="fade">

      <ul class="collection" v-if="!show">
        <li class="collection-item avatar" v-for="(question, index) in questions">
          <i class="material-icons circle green" v-if="question.state=='ganadora'">grade</i>
          <div class="row">
            <div class="col s12 m6">
              <span class="title">@{{question.title}}</span>
            </div>
            <div class="col s12 m6">
              <span v-if="question.state=='ganadora'" class="green-text">Pregunta ganadora</span>
            </div>

          </div>
          <a href="#modal6" class="secondary-content modal-trigger" v-on:click="showDetail(index)"><i class="material-icons">remove_red_eye</i></a>
        </li>
      </ul>
    <transition>
    </div>
  </div>


  <!-- Modal Structure -->
  <div id="modal6" class="modal showDetailQuestion">
    <div class="modal-content">
      <h4>@{{detailquestion.title}}</h4>
      <p>Creada: @{{detailquestion.created_at}}
          <br>
          Votos: @{{detailquestion.votes}}
      </p>
      <p>
        Respuestas:
      </p>
      <p>
        <template v-if="detailquestion.state == 'ganadora'">
          <ul>
            <li v-for="answer in detailquestion.answers">@{{answer.description}} - votos: @{{answer.votes}}</li>
          </ul>
          <a v-bind:href="'/graphicsquestion/' + detailquestion.id">Ver Resultados</a>
        </template>
        <template v-else>
          <ul>
            <li v-for="answer in detailquestion.answers">@{{answer.description}}</li>
          </ul>

        </template>

      </p>
    </div>
    <div class="modal-footer">
      <a v-on:click.prevent class="modal-action modal-close waves-effect waves-green btn-flat green white-text">Aceptar</a>
    </div>
  </div>

</div>

@endsection
@section('extra-js')
  <script type="text/javascript">
    $(document).ready(function(){
        $('.modal').modal();
    })
  </script>
@endsection
