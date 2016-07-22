<!DOCTYPE html>
<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Ejemplos de gr&#225;ficos usando Chart.js</title>
</head>
<body>
<h1>Ejemplos de gr&#225;ficos usando Chart.js</h1><br>

<script src="<?php echo URLV ?>js/Chart.js"></script>
<div id="canvas-holder">
<canvas id="chart-area" width="300" height="300"></canvas>
<canvas id="chart-area2" width="300" height="300"></canvas>
<canvas id="chart-area3" width="600" height="300"></canvas>
<canvas id="chart-area4" width="600" height="300"></canvas>
</div>
<script>
var f = new Date();
var fecha;
if (f.getMonth()<10) {
  fecha = f.getDate() + "/" + 1 + f.getMonth() + "/" + f.getFullYear();
}
else {
  fecha = f.getDate() + "/" + f.getMonth() + "/" + f.getFullYear();
}

var areas = ["Area1","Area2","Area3","Area4","Area5","Area6"]; //aqui la funcion de obtener todas las areas
//getMovimientosNombresRutaByDate();
var query = new Query();
var fecha = query->getFecha();
var tramite = getMovimientosNombresRutaByDate(fecha)
//var tramite = [["Tramite1","Area1","Area2","Area3"],["Tramite2","Area3","Area2","Area4"],["Tramite3","Area6","Area3","Area5"],["Tramite4","Area5","Area1","Area4"],["Tramite5","Area2","Area3","Area1"],["Tramite6","Area4","Area2","Area5"]]; //aqui va la funcion de alexis
var contadores = [0,0,0,0,0,0];
var a = 0;
while (a < tramite.length) {
  var b = 1;
  while (b < tramite[a].length) {
    if (tramite[a][b]==areas[0]) {
      contadores[0] = contadores[0] + 1;
    }
    else {
      if (tramite[a][b]==areas[1]) {
        contadores[1] = contadores[1] + 1;
      }
      else {
        if (tramite[a][b]==areas[2]) {
          contadores[2] = contadores[2] + 1;
        }
        else {
          if (tramite[a][b]==areas[3]) {
            contadores[3] = contadores[3] + 1;
          }
          else {
            if (tramite[a][b]==areas[4]) {
              contadores[4] = contadores[4] + 1;
            }
            else {
              if (tramite[a][b]==areas[5]) {
                contadores[5] = contadores[5] + 1;
              }
            }
          }
        }
      }
    }
    b = b + 1;
  }
  a = a + 1;
}

document.write(fecha);
var pieData = [{value: contadores[0],color:"#0b82e7",highlight: "#0c62ab",label: areas[0]},
				{
					value: contadores[1],
					color: "#e3e860",
					highlight: "#a9ad47",
					label: areas[1]
				},
				{
					value: contadores[2],
					color: "#eb5d82",
					highlight: "#b74865",
					label: areas[2]
				},
				{
					value: contadores[3],
					color: "#5ae85a",
					highlight: "#42a642",
					label: areas[3]
				},
				{
					value: contadores[4],
					color: "#e3e860",
					highlight: "#a9ad47",
					label: areas[4]
				},
				{
					value: contadores[5],
					color: "#eb5d82",
					highlight: "#a9ad47",
					label: areas[5]
				}
			];
  var asd = ["Area1","Area2","Area3","Area4","Area5","Area6","Area7"];
	var barChartData = {
		labels : asd,
		datasets : [
			{
				fillColor : "#6b9dfa",
				strokeColor : "#ffffff",
				highlightFill: "#1864f2",
				highlightStroke: "#ffffff",
				data : [90,30,10,80,15,5,15]
			},
			{
				fillColor : "#e9e225",
				strokeColor : "#ffffff",
				highlightFill : "#ee7f49",
				highlightStroke : "#ffffff",
				data : [40,50,70,40,85,55,15]
			}
		]

	}
		var lineChartData = {
			labels : ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio"],
			datasets : [
				{
					label: "Primera serie de datos",
					fillColor : "rgba(220,220,220,0.2)",
					strokeColor : "#6b9dfa",
					pointColor : "#1e45d7",
					pointStrokeColor : "#fff",
					pointHighlightFill : "#fff",
					pointHighlightStroke : "rgba(220,220,220,1)",
					data : [90,30,10,80,15,5,15]
				},
				{
					label: "Segunda serie de datos",
					fillColor : "rgba(151,187,205,0.2)",
					strokeColor : "#e9e225",
					pointColor : "#faab12",
					pointStrokeColor : "#fff",
					pointHighlightFill : "#fff",
					pointHighlightStroke : "rgba(151,187,205,1)",
					data : [40,50,70,40,85,55,15]
				}
			]

		}
var ctx = document.getElementById("chart-area").getContext("2d");
var ctx2 = document.getElementById("chart-area2").getContext("2d");
var ctx3 = document.getElementById("chart-area3").getContext("2d");
var ctx4 = document.getElementById("chart-area4").getContext("2d");
window.myPie = new Chart(ctx).Pie(pieData);
window.myPie = new Chart(ctx2).Doughnut(pieData);
window.myPie = new Chart(ctx3).Bar(barChartData, {responsive:true});
window.myPie = new Chart(ctx4).Line(lineChartData, {responsive:true});
</script>
</body>
</html>
