@extends('layouts.master')

@section('content')
  <!--question week-->
  <h1 class="text-center">{{$questionWeek->title}}</h1>
  <div class="container blue lighten-5 z-depth-3" >
		   <h4 class="indigo center-align"><font color="white" id="titleQuestion" ></font></h4>
		    <div class="container border-radius: 10px" id="cardQuestion">
		      <div class="row">
		        <div class="col s9 offset s3">
		          <!--Materialize Components Forms-->
		          <div class="row">


		              <div class="row">
		                <h5 id="qCreator"><i class="material-icons">face</i>  Creador: {{$questionWeek->user->email}}</h5>
		                <h5 id="created"><i class="material-icons">schedule</i> Creado: {{$questionWeek->created_at->diffForHumans()}}</h5>
		                <h5 id="totalVotes"><i class="material-icons">star</i> Votos: {{$questionWeek->votes}}</h5>
		              </div>

		              <div class="row">
		                <hr>
		                <div class="input-field col s12">
		                  <!-- Modal Trigger -->
                      @if (!$questionWeek->AlreadyAnswered)
                          <a class="waves-effect waves-light btn modal-trigger" href="#modal1">Responder</a>
                      @endif

		                  	  	<!--answers-->
								 	<div id="answersList">
								 	  <!-- Modal Structure -->
									  <div id="modal1" class="modal">
									    <div class="modal-content">
                        <h4>{{$questionWeek->title}}</h4>

                          @foreach ($questionWeek->answers as $answer)
                            <form action="{{route('answer.addVote',$questionWeek)}}" method="post">
                              {{ csrf_field() }}
                              <div class="input-field col s12">
                                <p >{{$answer->description}}</p>
                                <input type="hidden" name="answer" value="{{$answer->id}}">
                              </div>
                              <div class="row">
                                <button class="btn waves-effect waves-light" type="submit" name="action">
                                    <i class="material-icons right">thumb_up</i>
                                </button>
                            </div>
                          </form>
                          @endforeach



									    </div>
									    <div class="modal-footer">
									      <a href="#!" class="modal-action modal-close  waves-red btn-flat blue darken-3 white-text">Cancelar</a>
									    </div>
									  </div>
									</div>
							  	<!--end-->
		                  <br>
		                  <br>
		                  <h6><a href="{{route('showGraphsVotes',$questionWeek->id)}}"><i class="material-icons">show_chart</i> Ver votos</a></h6>
		                </div>
		              </div>


		          </div>
		        </div>
		      </div>
		    </div>
		</div>
  <!--end - questionweek-->

  <!--Questions proposed-->

	<h1>Preguntas propuestas</h1>
  <div class="carousel" >
    <div class="row">
      @foreach ($questions as $question)
        <div class="col s12 m6 l4 xl12">
          <div class="carousel-item">
      	  <div class="card">
              <div class="card-image">
                <img src="https://lorempixel.com/250/250/nature/1">
                <span class="card-title">{{$question->title}}</span>
                <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">thumb_up</i></a>
              </div>
              <div class="card-content">
                <p>Votos: {{$question->votes}}</p>
              </div>
           </div>
          </div>
        </div>
      @endforeach

    </div>
  </div>

    <div id="main" class="container">
      <!-- Modal Structure | add user-->
      <input type="hidden" name="" value="{{$group->id}}" v-model="group_id" id="group_id">
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
                    <li v-for="item in searchUser" class="collection-item"><div> @{{item.name}} <a href="#!"  v-on:click="addUser(item.id)" class="secondary-content"><i class="material-icons">person_add</i></a></div></li>
                  </ul>

                </div>
              </form>
            </div>
        </div>
        <div class="modal-footer">
          <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cancelar</a>
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
                          <input id="icon_prefix" type="text" class="validate" v-model="email">
                          <label for="icon_prefix">Usuario</label>
                  </div>
                  <ul class="collection">
                    <li v-for="(item, index) in searchUserForDelete" class="collection-item"><div> @{{item.name}} <a href="#!"  v-on:click="deleteUser(item.id, index)" class="secondary-content"><i class="material-icons">delete</i></a></div></li>
                  </ul>

                </div>
              </form>
            </div>
        </div>
        <div class="modal-footer">
          <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cancelar</a>
        </div>
      </div>
  </div>


      <div class="fixed-action-btn horizontal">
        <a class="btn-floating btn-large red">
          <i class="large material-icons">add</i>
        </a>
        <ul>
          <li><a class="btn-floating red modal-trigger" href="#modal2"><i class="material-icons">person_add</i></a></li>
          <li><a class="btn-floating orange darken-1 modal-trigger" href="#modal3"><i class="material-icons">delete</i></a></li>
          <li><a class="btn-floating green" href="{{route('winners',$group->id)}}"><i class="material-icons">timeline</i></a></li>
          <li><a class="btn-floating blue"><i class="material-icons">lightbulb_outline</i></a></li>
        </ul>
      </div>

@endsection
@section('extra-js')
  <script type="text/javascript" src="https://unpkg.com/vue@2.4.1"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.16.2/axios.min.js"></script>
  <script type="text/javascript">
    var aux = $("#group_id").val();
    $(document).ready(function(){
      $('.modal').modal();
      $('.carousel').carousel();
    })

    new Vue({
          el: "#main",
          data: {
            list: [],
            users : [],
            email:'',
            group_id: '',
          },
          created: function(){
            this.getUsers();
            this.getUsersOfGroup();
          },
          methods:{
            getUsers: function(){
              var urlUsers="http://localhost:8000/users";
              axios.get(urlUsers).then(response => {
                this.list= response.data.users;

              });
            },
            getUsersOfGroup: function(){
              var urlUsers="http://localhost:8000/users/" + aux;
              axios.get(urlUsers).then(response => {
                this.users = response.data.users;
                console.log(this.users);
              });
            },
            addUser: function(id){
              console.log("add user with id " + id +" and the id_group: " + aux)
              axios.post("http://localhost:8000/adduser/" + id + "/" + aux).then(response => {
                console.log(response.data.response);
                if (response.data.response) {
                  var $toastContent = $('<div class="card-panel green darken-1">Usuario agregado</div>');
                  Materialize.toast($toastContent, 2000);

                }else{
                  var $toastContent = $('    <div class="card-panel deep-orange accent-4">Este usuario ya esta en el grupo</div>');
                  Materialize.toast($toastContent, 2000);
                }
              });
            },
            deleteUser: function(id,index){
              console.log("delete user with id " + id +" and the id_group: " + aux)
              axios.post("http://localhost:8000/deleteuser/" + id + "/" + aux).then(response => {
                console.log(response.data.response);
                if (response.data.response) {
                  var $toastContent = $('<div class="card-panel green darken-1">Usuario eliminado</div>');
                  Materialize.toast($toastContent, 2000);
                  this.users.pop(index);

                }
              });
            }
          },

          computed:{
            searchUser:function(){
              return this.list.filter((item)=>item.email.includes(this.email));
            },
            searchUserForDelete:function(){
              return this.users.filter((item)=>item.email.includes(this.email));
            },
          }

        });
  </script>
@endsection
