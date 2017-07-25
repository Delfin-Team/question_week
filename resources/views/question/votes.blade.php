@extends('layouts.master')

@section('content')
  <h1 class="text-center">{{$question->title}}</h1>
  <input type="hidden" name="" value="{{$question->id}}" id="question_id">

  <canvas id="votes" width="100px" height="100px"></canvas>
@endsection

@section('extra-js')
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.min.js">
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
                    borderColor: graphsColors.reverse(),
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
