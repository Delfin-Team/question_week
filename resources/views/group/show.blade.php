@extends('layouts.master')

@section('content')
  <h1 class="center-align" > {{$group->name}}</h1>
    <div class="row">
      <div class="col s6 offset-s3">
        <h3 class="center-align">Preguntas propuestas esta semana!!!!!!!!!!!!!!!!!!!!</h3>

        <ul class="collapsible popout" data-collapsible="accordion">
          @foreach ($questions as $question)
            <li>
              <div class="collapsible-header"><i class="material-icons">arrow_drop_down</i>{{$question->title}}</div>
              <div class="collapsible-body">
                @foreach ($question->answers as $answer)
                  <span>{{$answer->description}}<br></span>
                @endforeach

              </div>
            </li>
          @endforeach
          <input type="hidden" value="{{$group->id}}" v-model="group_id" id="group_id">

        </ul>
      </div>
    </div>

    <div id="main" class="container">
      <!-- Modal Structure -->
      <div id="modal1" class="modal">
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
  </div>

      <div class="fixed-action-btn">
        <a class="btn-floating btn-large waves-effect waves-light red modal-trigger" href="#modal1"><i class="material-icons">person_add</i></a>
      </div>

@endsection
@section('extra-js')
  <script type="text/javascript" src="https://unpkg.com/vue@2.4.1"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.16.2/axios.min.js"></script>
  <script type="text/javascript">
    var aux = $("#group_id").val();
    $(document).ready(function(){
      $('.modal').modal();
    })

    new Vue({
          el: "#main",
          data: {
            list: [],
            email:'',
            group_id: '',
          },
          created: function(){
            this.getUsers();
          },
          methods:{
            getUsers: function(){
              var urlUsers="http://localhost:8000/users";
              axios.get(urlUsers).then(response => {
                this.list= response.data.users;
                console.log(this.list);
              });
            },
            addUser: function(id){
              console.log("add user with id " + id +" and the id_group: " + aux)
              axios.post("http://localhost:8000/adduser/" + id + "/" + aux).then(response => {
                console.log(response.data);
              });
            }
          },

          computed:{
            searchUser:function(){
              return this.list.filter((item)=>item.email.includes(this.email));
            }
          }

        });
  </script>
@endsection
