<h2>Delegacion de Trámite</h2>
<div class="container"> 

-----
TEmp:
<form id="nyform" action="<?php echo URLM."tramites/mover/" ?>" method="POST">
	mover a:
	<input id="idtramite" type="hidden" name="idtramite" value="">
	<input type="number" name="destino">
	<input type="submit">
</form>
<script >
	document.getElementById('idtramite').value = data.id;

</script>

------



<form method="post" action="#">
<div>
	<div class="form-group">
		<label for="tipo" class="col-sm-2 control-label" >Tipo </label>
		<div class="col-sm-10">
			<select name="tipo" class="form-control" id="tipo" >
				<option value="" >Seleccionar</option>
				<option value="1" required>Logistica</option>
				<option value="2" required>Contabilidad</option>
				<option value="3" required>Recursos Humanos</option>
				<option value="4" required>Informatica</option>
				<option value="5" required>Gerencia</option>
				<option value="6" required>Mesa de Partes</option>

			</select>
		<p id="notipo" ></p>
		</div>
	</div>
</div>
</form>
</div>
----------------------------