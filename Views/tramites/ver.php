<form action="<?php echo URLM."tramites/mover/" ?>" method="POST">
	mover a:
	<input id="idtramite" type="hidden" name="idtramite" value="">
	<input type="number" name="destino">
	<input type="submit">
</form>
<script >
	document.getElementById('idtramite').value = data.id;

</script>