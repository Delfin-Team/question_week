@extends('layouts.master')

@section('content')
  <div class="container" id="main">
      <div class="row">

        <h1 class="center-align" >Welcome</h1>
          <h2>Mis grupos</h2>
            <div class="row">
              <div class="col s6 offset-s3">
                <ul class="collection">
                  <li class="collection-item avatar" v-for="group in groups">
                    <img src="../images/janeth.jpg" alt="" class="circle">
                    <span class="title"><a :href="'groups/' + group.id">@{{group.name}}</a></span>
                    <p> Cantidad de Mienbros: </p>
                    <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
                  </li>
                </ul>
              </div>
            </div>

      </div>

        <div>
        <!-- Modal Structure -->
        <div id="modal1" class="modal">
          <div class="modal-content">
            <h4>Agregar un nuevo grupo:</h4>
              <div class="row">
                <form class="col s12">
                  <div class="row">
                    <div class="input-field col s12">
                      <i class="material-icons prefix">account_circle</i>
                      <input id="icon_prefix" type="text" class="validate" v-model="nameGroup">
                      <label for="icon_prefix">Nombre Grupo</label>
                    </div>
                  </div>
                </form>
              </div>
          </div>
          <div class="modal-footer">

            <button class="modal-action modal-close waves-effect waves-green btn-flat" v-on:click="addGroup" v-if="nameGroup"> crear </button>

            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cancelar</a>
          </div>
        </div>
    </div>
    </div>



   <!-- Modal Trigger -->
        <div class="fixed-action-btn">
          <a class="btn-floating btn-large waves-effect waves-light red modal-trigger" href="#modal1"><i class="material-icons">group_add</i></a>
        </div>
        @section('extra-js')
          <!-- vue -->
           <script type="text/javascript" src="https://unpkg.com/vue@2.4.1"></script>
           <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.16.2/axios.min.js"></script>
           <script>
            $(document).ready(function()    {
                $('.modal').modal();
            });
            new Vue({
              el: "#main",
              created: function(){
                this.getGroups();
              },
              data: {
                groups: [],
                nameGroup: "",
              },
              methods:{
                getGroups: function(){
                  var apiURl = "http://localhost:8000/getgroups";
                  axios.get(apiURl).then(response => {
                    this.groups = response.data.groups;
                    console.log(this.groups);
                  });
                },
                addGroup: function(){
                  axios.post("http://localhost:8000/groups", {
                    name: this.nameGroup,
                  }).then(response => {
                      console.log(response);
                      if (response.status == 200) {
                        console.log(response.data.group);
                        this.groups.push(response.data.group);
                      }
                      this.nameGroup= "";
                      //this.getGroups();
                    }
                  );
                },
              }
            });
            </script>
        @endsection
@endsection
