@extends('layouts.master')
@section('content')
  <div class="row">
    <div class="col-xs-12">
      <canvas id="myChart" width="400" height="400"></canvas>
    </div>
  </div>
@endsection

@section('extra-js')
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.min.js">
  </script>
  <script type="text/javascript">
  //ajax request
  function getRandomInt() {
    return parseInt(Math.random() * (7));
  }
  $.ajax({
    url : '/votesQuestions',
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
      $.each(data.questions,function(i, item){
        console.log(data.questions[i].title);
        mylabels.push(data.questions[i].title);
        totalVotes.push(data.questions[i].votes);
        var newNumber = getRandomInt();
        console.log(newNumber);
        graphsColors.push(colors[newNumber]);
        /*
        if (i%2!=0) {
          colors.push('rgba(255, 99, 132, 0.2)');
        }else{
          colors.push('rgba(54, 162, 235, 0.2)');
        }
        */
      });
      //draw graphic :)
      console.log(mylabels);
      var ctx = document.getElementById("myChart").getContext('2d');
      var myOwnChart = new Chart(ctx, {
        type: 'bar',
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
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
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

  </script>
@endsection
