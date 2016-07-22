<form method="post" action="<?php echo URLM ?>personas/borrar">
	<input id="id" type="hidden" name="iduser" value="">
	<input type="submit" value="Borrar Persona">
</form>

<script type="text/javascript">
	document.getElementById('id').value = idpersona;
</script>