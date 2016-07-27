<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>Imprimiendo 1</title>
  <script type="text/javascript" src="jquery.js"></script>
  <script type="text/javascript" src="jquery.PrintArea.js"></script>
</head>
<body>
  <h2>Imprimir una zona específica con jQuery</h2>
  <p><a href="javascript:void(0)" id="imprime">Imprime</a></p>
 
  <div id="myPrintArea">
   Zna que se imprimira
  </div>
 
<script type="text/javascript">
$(document).ready(function() {
    $("#imprime").click(function () {
        $("div#myPrintArea").printArea();
    })
});
</script>
</body>
</html>