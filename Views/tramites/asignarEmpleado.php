<div class="container"> 

<form id="nyform" action="<?php echo URLM."tramites/mover" ?>" method="POST">
	<input id="idtramite" type="hidden" name="idtramite" value="">
	<input type="number" name="destino">
	<input type="submit">
</form>
<script >
	document.getElementById('idtramite').value = data.id;
</script>
<p id="notipo" ></p>

<h2>Delegacion de Trámite</h2>
<form method="post" action="#">
<div>
	<div class="form-group">
		<label for="tipo" class="col-sm-2 control-label" >Enviar a : </label>
		<div class="col-sm-10">
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
</div>
</form>
</div>