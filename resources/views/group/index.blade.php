@extends('layouts.master')

@section('content')
  <div class="container" id="main">
      <div class="row">
        <h1 class="center-align" >Welcome</h1>
        <h2>Mis grupos</h2>

        <div class="row">
          <form class="col s12">
            <div class="row">
              <div class="input-field col s12">
                <i class="material-icons prefix">search</i>
                <textarea id="icon_prefix2" class="materialize-textarea" v-model="nameToSearch"></textarea>
                <label for="icon_prefix2">Nombre del grupo</label>
              </div>
            </div>
          </form>
        </div>

        <div class="row">
          <div class="col s12">
            <ul class="collection">
              <li class="collection-item avatar" v-for="group in groupsResult">
                <img src="../images/janeth.jpg" alt="" class="circle">
                <span class="title"><a :href="'groups/' + group.id">@{{group.name}}</a></span>
                <p> Cantidad de Mienbros: </p>
                <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
              </li>
            </ul>
          </div>
        </div>
      </div><!--end row-->
      <!-- Modal Structure -->
      <div id="modal1" class="modal">
        <div class="modal-content">
          <h4>Agregar Grupo</h4>
          <div class="row">
                <form class="col s12">
                  <div class="row">
                     <div class="input-field col s12">
                            <i class="material-icons prefix">people</i>
                            <input type="text" class="validate" v-model="nameGroup">
                            <label for="icon_prefix">Nombre del Grupo</label>
                      </div>
                      <div class="input-field col s6 offset-s3">

                     </div>
                     <p>
                       <i class="material-icons prefix">lock</i>
                      <input type="checkbox" id="test5" v-model="selected" />
                      <label for="test5">Privado?</label>
                     </p>
                  </div>

                </form>
          </div>
        </div>
        <div class="modal-footer">
          <button class="modal-action modal-close waves-effect waves-green btn-flat" v-on:click="addGroup" v-if="nameGroup.length > 2" > Agregar </button>
          <a v-on:click.prevent class="modal-action modal-close waves-effect waves-green btn-flat">Cancelar</a>
        </div>
      </div>
      <div id="modal2" class="modal">
        <div class="modal-content">
          <h4>Eliminar  un grupo</h4>
          <div class="row">
                <form class="col s12">
                  <div class="row">

                     <div class="input-field col s12">
                            <i class="material-icons prefix">people</i>
                            <input id="icon_prefix" type="text" class="validate" v-model="nameToDelete">
                            <label for="icon_prefix">Nombre del Grupo</label>
                          </div>
                    <ul class="collection">
                      <li v-for="(group, index) in searchGroupToDelete" class="collection-item"><div>@{{group.name}}<a href="#!" class="secondary-content" v-on:click="deleteGroup(group.id, index)"><i class="material-icons">delete_forever</i></a></div></li>
                    </ul>

                  </div>
                </form>
          </div>
        </div>
        <div class="modal-footer">
          <a v-on:click.prevent class="modal-action modal-close waves-effect waves-green btn-flat">Cancelar</a>
        </div>
      </div>
      <div id="modal3" class="modal">
        <div class="modal-content">
          <h4>Buscar Grupos</h4>
                    <div class="row">
                  <form class="col s12">
                    <div class="row">

                       <div class="input-field col s12">
                              <i class="material-icons prefix">people</i>
                              <input id="icon_prefix" type="text" class="validate" v-model="nameToJoin">
                              <label for="icon_prefix">Nombre del Grupo</label>
                        </div>
                      <ul class="collection">

                        <li v-for="group in searchGroupToJoin" class="collection-item"><div>@{{group.name}}<a href="#!" class="secondary-content" v-on:click="sendRequest(group.id)"><i class="material-icons" >send</i></a></div></li>
                      </ul>

                    </div>
                  </form>
            </div>
        </div>
        <div class="modal-footer">
          <a v-on:click.prevent class="modal-action modal-close waves-effect waves-green btn-flat">Cancelar</a>

        </div>
      </div>

    </div>
    <!-- Modal Trigger -->
     <div class="fixed-action-btn horizontal click-to-toggle">
       <a class="btn-floating btn-large red">
         <i class="material-icons">supervisor_account</i>
       </a>
       <ul>

         <li><a  href="#modal2" class="btn-floating orange darken-1 modal-trigger"><i class="material-icons">delete</i></a></li>
         <li><a  href="#modal1" class="btn-floating green modal-trigger"><i class="material-icons">group_add</i></a></li>
         <li><a  href="#modal3" class="btn-floating blue modal-trigger"><i class="material-icons">search</i></a></li>
       </ul>
     </div>
@section('extra-js')
  <!-- vue -->
   <script type="text/javascript" src="https://unpkg.com/vue@2.4.1"></script>
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.16.2/axios.min.js"></script>
   <script>
    $(document).ready(function()    {
        $('.modal').modal();
        $('select').material_select();
    });
    new Vue({
      el: "#main",
      created: function(){
        this.getGroups();
      },
      data: {
        groups: [],
        groupsUser:[],
        selected: "",
        possibleGroups: [],
        nameGroup: "",
        nameToSearch: "",
        typeGroup: "",
        nameToDelete: "",
        nameToJoin: "",
      },
      methods:{
        getGroups: function(){
          var apiURl = "http://localhost:8000/getgroups";
          axios.get(apiURl).then(response => {
            this.groups = response.data.user.groups;
            this.groupsUser = response.data.user.groups_created;
            this.possibleGroups = response.data.possibleGroups;
            console.log(response.data.user);
          });
        },
        addGroup: function(){
          axios.post("http://localhost:8000/groups", {
            name: this.nameGroup,
            private: this.selected,
          }).then(response => {
              console.log(response);
              if (response.status == 200) {
                console.log(response.data.group);
                this.groups.push(response.data.group);
                this.groupsUser.push(response.data.group);
                var $toastContent = $('<div class="card-panel green darken-1">Grupo creado correctamente.</div>');
                Materialize.toast($toastContent, 2000);
                this.nameGroup= "";
                this.selected = "";
              }

            }
          );
        },
        deleteGroup: function(id, index){
          console.log('delete with position: ' + index + ' and id: '+ id);

          axios.delete("http://localhost:8000/groups/" + id).then(response => {
              if (response.status == 200) {
                this.groups.pop(index);
                var $toastContent = $('<div class="card-panel green darken-1">Grupo eliminado</div>');
                Materialize.toast($toastContent, 2000);
                this.nameToDelete = "";
              }

            }
          ).catch(error => {
            var $toastContent = $('<div class="card-panel red darken-1">Ha surgido un error</div>');
            Materialize.toast($toastContent, 2000);
            this.nameToDelete = "";
          });
        },
        sendRequest: function(id){
          axios.post('http://localhost:8000/requestsuser',{
            group_id: id
          }).then(response => {
            if (response.status == 200) {

              console.log(response.data.created);
              if (response.data.created) {
                var $toastContent = $('<div class="card-panel green darken-1">Solicitud enviada correctamente</div>');
                Materialize.toast($toastContent, 2000);
              }else{
                var $toastContent = $('<div class="card-panel red darken-1">Ya has enviado una solicitud antes</div>');
                Materialize.toast($toastContent, 2000);
              }
            }
          }).catch(error => {
            var $toastContent = $('<div class="card-panel red darken-1">Ha surgido un error</div>');
            Materialize.toast($toastContent, 2000);
          });
        },
      },

      computed:{
          searchGroupToDelete:function(){
            return this.groupsUser.filter((group)=>group.name.includes(this.nameToDelete));
          },
          searchGroupToJoin:function(){
            return this.possibleGroups.filter((group)=>group.name.includes(this.nameToJoin));
          },
          groupsResult:function(){
            return this.groups.filter((group)=>group.name.includes(this.nameToSearch));
          }
    },
    });
    </script>
@endsection
@endsection
