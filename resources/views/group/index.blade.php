@extends('layouts.master')

@section('content')
  <div class="container" id="mainGroup">
      <div class="row">
        <div class="center-align">
          <h2>Mis grupos</h2>
        </div>


        <div class="row">
          <form class="col s12">
            <div class="row">
              <div class="input-field col s12">
                <i class="material-icons prefix">search</i>
                <textarea id="icon_prefix2" class="materialize-textarea" v-model="nameToSearch"></textarea>
                <label for="icon_prefix2">Buscar grupo</label>
              </div>
            </div>
          </form>
        </div>

        <div class="row">
          <div class="col s12">
            <ul class="collection">
              <li class="collection-item avatar" v-for="group in groupsResult">
                <img src="{{asset('/images/groups.png')}}" alt="" class="circle">
                <span class="title"><a :href="'groups/' + group.id">@{{group.name}}</a></span>
                <p v-if="group.private">
                  Privado
                </p>
                <p v-else>
                  Público
                </p>
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
          <button class="modal-action modal-close waves-effect btn-flat green white-text" v-on:click="addGroup" v-if="nameGroup.length > 2" > Agregar </button>
          <a v-on:click.prevent class="modal-action modal-close waves-effect btn-flat red white-text">Cancelar</a>
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
          <a v-on:click.prevent class="modal-action modal-close waves-effect btn-flat red white-text">Cancelar</a>
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
          <a v-on:click.prevent class="modal-action modal-close waves-effect btn-flat red white-text">Cancelar</a>

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
   <script>
    $(document).ready(function()    {
        $('.modal').modal();
        $('select').material_select();
    });

    </script>
@endsection
@endsection
