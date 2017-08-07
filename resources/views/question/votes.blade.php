@extends('layouts.master')

@section('content')
  <div class="center-align">
    <h1 >{{$question->title}}</h1>
  </div>
  <input type="hidden" name="" value="{{$question->id}}" id="question_id">

  <div class="row" id="vote">
    <div class="col s8">
      <canvas id="votes" width="10px" height="10px"></canvas>
    </div>
    <div class="col s4">
      <ul class="collection">
        <li class="collection-item active">Resultados</li>
        <li class="collection-item" v-for="answer in answers">
          @{{answer.description}} <hr>

          votos: @{{answer.votes}} <i class="material-icons">thumb_up</i>
        </li>
      </ul>
    </div>
  </div>
@endsection

@section('extra-js')
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.min.js">
  </script>
  <script type="text/javascript" src="https://unpkg.com/vue@2.4.1"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.16.2/axios.min.js"></script>

  <script type="text/javascript">
    var question_id = $("#question_id").val();
    new Vue({
      el: "#vote",
      created: function(){
        this.getQuestion();
        console.log(this.answers)
      },
      data: {
        answers: [],
      },
      methods:{
        getQuestion: function(){
          axios.get('http://localhost:8000/votesanswers/' + question_id).then(response => {
            this.answers = response.data.answers;
            var mylabels = [];
            var totalVotes = [];
            var colors = [
              '#f44336',//0
              '#2196f3',//1
              '#00bcd4',//2
              '#009688',//3
              '#4caf50',//4
              '#64ffda',//5
              '#ff9800',//6
              '#ff5722'//7
            ];
            $.each(this.answers,function(i, item){
              mylabels.push(data.answers[i].description);
              totalVotes.push(data.answers[i].votes);
              var newNumber = getRandomInt();
              console.log(newNumber);
              graphsColors.push(colors[newNumber]);

            });
          }).catch(error => {

          });
        },
      }

    });
  </script>

  <script type="text/javascript">
    var question_id = $("#question_id").val();
      $.ajax({
        url : '/votesanswers/' + question_id,
        type : 'GET',

        dataType : 'json',
        success : function(data) {

          console.log(data);

          var mylabels = [];
          var totalVotes = [];
          var colors = [
            '#f44336',//0
            '#2196f3',//1
            '#00bcd4',//2
            '#009688',//3
            '#4caf50',//4
            '#64ffda',//5
            '#ff9800',//6
            '#ff5722'//7
          ];
          var graphsColors = [];
          $.each(data.answers,function(i, item){
            mylabels.push(data.answers[i].description);
            totalVotes.push(data.answers[i].votes);
            var newNumber = getRandomInt();
            console.log(newNumber);
            graphsColors.push(colors[newNumber]);

          });
          //draw graphic :)
          console.log(mylabels);
          var ctx = document.getElementById("votes").getContext('2d');
          var myOwnChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: mylabels,
                datasets: [{
                    label: '# Votos',
                    data: totalVotes,
                    backgroundColor: graphsColors,
                    borderColor: '#000000',
                    borderWidth: 2
                }]
            },
            options: {

            }
          });
        },
        error : function(xhr, status) {
            console.log("something was wrong!")
        },
        complete : function(xhr, status) {
            console.log("request done!")
        }
    });


  //ajax request
  function getRandomInt() {
    return parseInt(Math.random() * (7));
  }

  </script>
@endsection
