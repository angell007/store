@extends('layouts.app')
@section('content')
    <div class="hero-body">
        <div class="container has-text-justified">
            <h3 class="subtitle is-4">
            En TryStore contamos por ti!
            <br>
            Aqui puedes ver las cisitas que tu post ha obtenido de esa manera sabes que tan              
            llamativo ha sido tu producto o servicio en nuestra comunidad
            </h3>
            <div class="columns is-vcentered">
                <div class="column is-5">
                    <div>
                        <canvas id="oilChart" style="width: 100%; height: 300px; margin: 0 auto"></canvas>
                    </div>
                </div>
                <div class="column is-6 is-offset-1">
                    <h1 class="title is-2">
                        Comentarios
                    </h1>
                    <h2 class="subtitle is-4  has-text-justified">
                        Que dice nuestra comunidad de tu post ? cuantas opiniones has obtenido!.
                    </h2>
                    <br>
                </div>
            </div>
            <div class="container has-text-justified">
            <div class="columns is-vcentered">
                <div class="column is-5">
                    <div>
                        <canvas id="myChart" style="width: 100%; height: 300px; margin: 0 auto"></canvas>
                    </div>
                </div>
                <div class="column is-6 is-offset-1">
                    <h1 class="title is-2">
                       Likes
                    </h1>
                    <h2 class="subtitle is-4 has-text-justified">
                        Le gusta tu idea a nuestra comunidad? Que dicen los votos! compara facilmente .
                    </h2>
                    <br>
                </div>
            </div>
          </div>
        </div>
    </div>
</div>

<script type="application/javascript">
// alert('{!! $dislikes !!}');
// console.log("hola");

var oilCanvas = document.getElementById("oilChart");

Chart.defaults.global.defaultFontFamily = "Lato";
Chart.defaults.global.defaultFontSize = 18;
var oilData = {
    labels: [
        "Visitas",
        "Opiniones",
    ],
    datasets: [
        {
            data: ["{{ $vistas }}", "{{ $opiniones }}"],
            backgroundColor: [
                "#FF6384",
                "#63FF84",
                // "#84FF63",
            ]
        }]
};

var pieChart = new Chart(oilCanvas, {
  type: 'pie',
  data: oilData
});

// alert("{{ $likes }}");

  var ctx = document.getElementById("myChart");

  var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ["Likes","Dislikes"],
  datasets: [{
    label: "",
    data: ["{{ $likes }}" , "{{ $dislikes }}"],
    backgroundColor: [
    // '#CD7575',
    '#BFEC81',
    'rgba(60, 99, 132, 0.6)',
  ],
    borderColor: "rgba(0, 158, 219, 1)",
    borderWidth: "2",
  }]
},
options: {
  legend:{
      display: false
  },
  scales: {
    xAxes: [{
        gridLines: {
            show: true,
            color: "F3F3F3",
        }
    }],
    yAxes: [{
      ticks: {
        beginAtZero: true
      }
    }]
  },
}
  });

</script>
@endsection