<1div class="container"> 

<form id="nyform" action="<?php echo URLM."tramites/mover" ?>" method="POST">
	<input id="idtramite" type="hidden" name="idtramite" value="">
	<input type="number" name="destino">
	<input type="submit">
</form>
<script >
	document.getElementById('idtramite').value = data[0];
</script>
<p id="notipo" ></p>

<h2>Delegacion de Trámite</h2>

<div class="container">
<form method="post" action="<?php echo URML."tramites/mover" ?>">
	  <div class="row container form-group">
      <div class="col-xs-8">
        <label for="idtra" class="col-sm-5 control-label" >Enviar a: </label>
        <div class="col-sm-7">
			<select name="tipo" class="form-control" id="tipo" >
				<option value="" >Seleccionar</option>
				<script type="text/javascript">
              		//var opciones=["logistica","secretaria","Dirección Academica","Sistemas"];
              		var nuevo,tamanio;
              		tamanio=areas.length;
              		for (var i=0;i<tamanio;i++){
                	nuevo=areas[i];
                	document.write("<option value='" +nuevo[0]+"'>"+nuevo[1]+"</option>");
              		}
            	</script>
			</select>          
        </div>
      </div>
      <div class="col-xs-4">
      	<input id="idtramite" type="hidden" name="idtramite2" value="">
		<input type="number" name="destino">
		<input type="submit">
  </div>
</form>
</div>

<script >
	document.getElementById('idtramite2').value = data[0];
</script>