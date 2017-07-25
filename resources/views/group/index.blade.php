@extends('layouts.master')

@section('content')

  <div class="row">
    <h1 class="center-align" >Welcome</h1>
      <h2>Mis grupos</h2>
        <div class="row">
          <div class="col s8 offset-s2">
            <ul class="collection">
              @foreach ($userGroups as $group)
                <li class="collection-item avatar" >
                  <img src="../images/janeth.jpg" alt="" class="circle">
                  <span class="title"><a href="mygroup.html"></a></span>
                  <p>
                    <a href="{{route('groups.show',$group->id)}}">
                      <i class="material-icons">people</i>&nbsp {{$group->name}}
                    </a>
                   </p>
                  <a class="waves-effect waves-red btn-floating secondary-content" v-on:click="deleteGroup(group.id)"><i class="material-icons">delete</i></a>
                </li>
              @endforeach

            </ul>
          </div>
        </div>



  </div>
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
      <div class="fixed-action-btn">
        <a class="btn-floating btn-large waves-effect waves-light red modal-trigger" href="#modal1"><i class="material-icons">group_add</i></a>
      </div>





  @section('extra-js')
    <script type="text/javascript">
      $(document).ready(function(){
        $('.modal').modal();
      })
    </script>
  @endsection
@endsection
