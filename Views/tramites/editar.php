<div class="container">
<p>.</p>
<p></p>	
<form class="form-horizontal">
  <div class="row container form-group">
      <div class="col-xs-6">
        <label for="idtra" class="col-sm-5 control-label" >ID Trámite</label>
        <div class="col-sm-7">
          <input name="idtra" type="text" class="form-control" id="idtra" disabled="">
        </div>
      </div>
      <div class="col-xs-6">
        <label for="deste" class="col-sm-4 control-label" >Destino</label>
        <div class="col-sm-8">
          <input name="deste"type="text" class="form-control" id="deste" disabled>
        </div>
      </div>
  </div>

 <div class="row container form-group">
      <div class="col-xs-6">
        <label for="reme" class="col-sm-5 control-label" >Remitente</label>
        <div class="col-sm-7">
          <input name="reme" type="text" class="form-control" id="reme" disabled="">
        </div>
      </div>
      <div class="col-xs-6">
        <label for="dne" class="col-sm-4 control-label" >DNI</label>
        <div class="col-sm-8">
          <input name="dne"type="text" class="form-control" id="dne" disabled="">
        </div>
      </div>
  </div>

  <div class="row container form-group">
      <div class="col-xs-6">
        <label for="estade" class="col-sm-5 control-label" >Estado</label>
        <div class="col-sm-7">
          <input name="estade" type="text" class="form-control" id="estade" disabled="">
        </div>
      </div>
      <div class="col-xs-6">
        <label for="priori" class="col-sm-4 control-label" >Prioridad</label>
        <div class="col-sm-8">
          <input name="priori"type="text" class="form-control" id="priori" disabled="">
        </div>
      </div>
  </div>

  <div class="row container form-group">
      <div class="col-xs-6">
        <label for="ingreso" class="col-sm-5 control-label" >Fecha Ingreso</label>
        <div class="col-sm-7">
          <input name="ingreso" type="text" class="form-control" id="ingreso" disabled="">
        </div>
      </div>
      <div class="col-xs-6">
        <label for="termino" class="col-sm-4 control-label" >Fecha Termino</label>
        <div class="col-sm-8">
          <input name="termino"type="text" class="form-control" id="termino" disabled="">
        </div>
      </div>
  </div>

	<div class="form-group">
  		<label for="asunte" class="col-sm-2 control-label" >Asunto </label>
  		<div class="col-sm-10" >
  			<textarea  name="asunte" class="form-control" rows="3" id="asunte" disabled=""></textarea>
  		</div>
  	</div>
  	<p id="ejemplo"> </p>
	<input id="este" >		
</form>
</div>
  <script>
  	 document.getElementById("idtra").value=data[0];
  	 document.getElementById("ingreso").value=data[2];
  	 document.getElementById("termino").value=data[3];
 	 document.getElementById('asunte').value=data[4];
 	 document.getElementById('reme').value=data[5];
 	 document.getElementById('priori').value=data[7];
 	 document.getElementById('estade').value=data[8];
  </script>	