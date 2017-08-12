@extends('layouts.master')
@section('content')
  <div class="row" id="mainShowGroup">
  <!--question week-->
    <div class="container blue lighten-5 z-depth-3" style="margin-top:50px;">
  	  <template v-if="questionWeek != null">
        <h4 class="indigo center-align"><font color="white" id="titleQuestion" ><h5 class="text-center">@{{questionWeek.title}}</h5></font></h4>
        <div class="container border-radius: 10px" style="padding:10px;">
    		    <div class="row">
    		        <div class="col s12 m6 l6 xl8 offset m3 l3 xl2">
    		            <div class="row">
    		                <div class="row">
      		                <h6 id="qCreator" v-if="questionWeek.public"><i class="material-icons">face</i >  Creador:
                              @{{questionWeek.user.email}}
                          </h6>

                          <span class="">
                            <i class="material-icons">schedule</i> Creado: @{{questionWeek.created_at}}
                          </span> <br>
                          <span class="">
                            <i class="material-icons">thumb_up</i> Votos totales con los que ganó: @{{questionWeek.votes}}
                          </span>


    		                </div>

    		                <div class="row">
    		                    <hr>
    		                    <div class="input-field col s12">
    		                  <!-- Modal Trigger -->
                          <template v-if="!questionWeek.alreadyAnswered">
                            <a class="waves-effect waves-light btn modal-trigger" href="#modal1">Responder</a>
                          </template>
    		                  	  	<!--answers-->
    								 	      <div id="answersList">
    								 	      <!-- Modal Structure -->
      									      <div id="modal1" class="modal">
                                <div class="modal-content">
                                  <h4>@{{questionWeek.title}}</h4>
                                  <template v-if="!questionWeek.alreadyAnswered">
                                    <form v-for="answer in questionWeek.answers" v-on:submit.prevent>
                                      <div class="input-field col s12">
                                        <p>@{{answer.description}}</p>
                                        <input type="hidden" name="answer" v-bind:value="answer.id">
                                      </div>
                                      <div class="row">
                                        <button class="btn waves-effect waves-light" name="action" v-on:click="addVoteToAnswer(questionWeek.id,answer.id)">
                                            <i class="material-icons right">thumb_up</i>
                                        </button>
                                      </div>
                                    </form>
                                  </template>
                                  <p v-else>
                                    Pregunta respondida :)
                                  </p>

      									        </div>
          									    <div class="modal-footer">
          									      <a v-on:click.prevent class="modal-action modal-close  waves-red btn-flat red white-text">Cerrar</a>
          									    </div>
      									      </div>
    									      </div>
    							  	<!--end-->
    		                  <br>
    		                  <br>
    		                  <h6><a v-bind:href="'/graphicsquestion/' + questionWeek.id"><i class="material-icons">show_chart</i> Ver votos</a></h6>
    		                </div>
    		              </div>


    		          </div>
    		        </div>
    		      </div>
    		    </div>
  	  </template>
      <p v-else>
        No se registraron preguntas la semana pasada :(
      </p>
  		</div>
      <h3>Preguntas propuestas esta semana</h3>

      <div class="row">
        <div class="col s12 m6 xl4" v-for="(question,index) in sortQuestions">
          <div class="card small">
            <div class="card-image">
              <img src="{{asset('images/questions.png')}}">
              <span class="card-title black-text darken-2">Propuesta</span>

            </div>
            <div class="card-content">
              <p>@{{question.title}}</p>
              <p>
                Votos: @{{question.votes}}
              </p>
              <p v-if="question.public">
                Creador: @{{question.user.name}}
              </p>
              <p v-else>
                Creador: Anomino
              </p>
              <a class="btn-floating halfway-fab waves-effect waves-light red" v-on:click="addVoteToQuestion(question.id, index)" v-if="!question.alreadyVote"><i class="material-icons">thumb_up</i></a>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal Structure | add user-->
      <div id="modal2" class="modal">
        <div class="modal-content">
          <h4>Agregar un Usuario:</h4>
            <div class="row">
              <form class="col s12">
                <div class="row">

                   <div class="input-field col s12">
                          <i class="material-icons prefix">account_circle</i>
                          <input id="icon_prefix" type="text" class="validate" v-model="email">
                          <label for="icon_prefix">Usuario</label>
                  </div>
                  <ul class="collection">
                    <li v-for="item in searchUser" class="collection-item"><div> @{{item.email}} <a href="#!"  v-on:click="addUser(item.id)" class="secondary-content"><i class="material-icons">person_add</i></a></div></li>
                  </ul>

                </div>
              </form>
            </div>
        </div>
        <div class="modal-footer">
          <a v-on:click.prevent class="modal-action modal-close waves-effect red white-text btn-flat">Cancelar</a>
        </div>
      </div>
      <!-- Modal Structure | delete user-->
      <div id="modal3" class="modal">
        <div class="modal-content">
          <h4>Eliminar un Usuario:</h4>

            <div class="row">
              <form class="col s12">
                <div class="row">

                   <div class="input-field col s12">
                          <i class="material-icons prefix">account_circle</i>
                          <input id="icon_prefix" type="text" class="validate" v-model="emailToDelete">
                          <label for="icon_prefix">Usuario</label>
                  </div>
                  <ul class="collection">
                    <li v-for="(item, index) in searchUserForDelete" class="collection-item"><div> @{{item.email}} <a href="#!"  v-on:click="deleteUser(item.id, index)" class="secondary-content"><i class="material-icons">delete</i></a></div></li>
                  </ul>

                </div>
              </form>
            </div>
        </div>
        <div class="modal-footer">
          <a v-on:click.prevent class="modal-action modal-close waves-effect red white-text btn-flat">Cancelar</a>
        </div>
      </div>
      <!-- Modal Structure | create a new question-->
      <div id="modal4" class="modal">
        <div class="modal-content">
          <div class="row">
           <form v-on:submit.prevent>
             <div class="row">
                <div class="input-field col s12 ">
                 <i class="material-icons prefix">insert_emoticon</i>
                 <input id="icon_prefix" type="text" class="validate" v-model="newQuestion.title">
                 <label for="icon_prefix">Titulo: ¿@{{newQuestion.title}}?</label>
                </div>
               <h3 class="text center">Posibles respuestas</h3>
               <div class="input-field col s12 xl4 m12">
                 <i class="material-icons prefix">local_activity</i>
                 <input id="icon_prefix" type="text" class="validate" name="answer1" v-model="newQuestion.answer1">
                 <label for="icon_prefix">Respuesta 1</label>
               </div>
               <div class="input-field col s12 xl4 m12">
                 <i class="material-icons prefix">local_activity</i>
                 <input id="icon_telephone" type="tel" class="validate" name="answer2" v-model="newQuestion.answer2">
                 <label for="icon_telephone">Respuesta 2</label>
               </div>
               <div class="input-field col s12 xl4 m12">
                 <i class="material-icons prefix">local_activity</i>
                 <input id="icon_telephone" type="tel" class="validate" name="answer3" v-model="newQuestion.answer3">
                 <label for="icon_telephone">Respuesta 3</label>
               </div>
               <p>
                 <i class="material-icons prefix">lock</i>
                <input type="checkbox" id="test9" v-model="publicQuestion" />
                <label for="test9">Anonimo?</label>
               </p>
             </div>
             <div class="center-align">
               <button class="btn waves-effect waves-light" v-if="newQuestion.title.length > 2" v-on:click="addQuestion">
                 Enviar
                 <i class="material-icons right">send</i>
                </button>
             </div>
           </form>
         </div>
        </div>
        <div class="modal-footer">
          <a v-on:click.prevent class="modal-action modal-close waves-effect red white-text btn-flat">Cancelar</a>
        </div>
      </div>

      <!--requests-->
      <!-- Modal Trigger -->

  <!-- Modal Structure -->
  <div id="modal9" class="modal bottom-sheet">
    <div class="modal-content">
      <h4>Solicitudes</h4>
      <ul class="collection">

        <li class="collection-item avatar" v-for="(request,index) in requests">
          <i class="material-icons circle green">portrait</i>
          <span class="title"> @{{request.user.name}} - @{{request.user.email}} </span>
          <p> <br>
            @{{request.created_at}}
          </p>
          <a href="#!" class="secondary-content" v-on:click="addUserToGroup(request.id,index)"><i class="material-icons">check</i></a>
        </li>
      </ul>
    </div>
    <div class="modal-footer">
      <a v-on:click.prevent class="modal-action modal-close waves-effect red white-text waves-green btn-flat">Cerrar</a>
    </div>
  </div>
  </div>


      <div class="fixed-action-btn horizontal">
        <a class="btn-floating btn-large red">
          <i class="large material-icons">add</i>
        </a>
        <ul>
          @if ($owner->id == Auth::user()->id)
            <li><a class="btn-floating blue modal-trigger" href="#modal9"><i class="material-icons">assignment</i></a></li>
            <li><a class="btn-floating red modal-trigger" href="#modal2"><i class="material-icons">person_add</i></a></li>
            <li><a class="btn-floating orange darken-1 modal-trigger" href="#modal3"><i class="material-icons">delete</i></a></li>

          @endif
          <li><a class="btn-floating green" href="{{route('winners',$group->id)}}"><i class="material-icons">timeline</i></a></li>
          <li><a class="btn-floating blue modal-trigger" href="#modal4"><i class="material-icons">lightbulb_outline</i></a></li>
        </ul>
      </div>

@endsection
@section('extra-js')
  <script type="text/javascript">
        $(document).ready(function(){
          $('.modal').modal();
          $('.carousel').carousel();
          $(".button-collapse").sideNav();
        });

  </script>
@endsection
