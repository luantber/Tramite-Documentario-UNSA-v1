			<!--.............................NUEVO TRÁMITE .............................. !-->
<h2 class="text-center" >Nuevo Trámite</h2>
<form class="form-horizontal container">
	<div class="form-group" >
		<label for="in-tipo" class="col-sm-2 control-label">Tipo: </label>
		<div class="col-sm-10" >
			<label class="radio-inline"><input type="radio" name="optradio" id="int-tipo">Persona Natural</label>			
			<label class="radio-inline"><input type="radio" name="optradio" id="int-tipo">Empresa/Institución</label>
		</div>		
	</div>

	<div class="form-group">
    	<label for="identificacion" class="col-sm-2 control-label" >ID</label>
    	<div class="col-sm-10">
      		<input name="ident" type="text" class="form-control" id="identificacion" required placeholder=" Ingrese nombre de usuario">
    	</div>
  </div>
	
  	<div class="form-group">
  		<label for="descripcion" class="col-sm-2 control-label" >Descripción</label>
  		<div class="col-sm-10" >
  			<input name="descrip" type="text" class="form-control" id="descripcion" required placeholder=" Ingrese número de indentifiación">
  		</div>
  	</div>

  	
  	<div class="row container form-group">
  		<div class="col-xs-6">
  			<label for="numero" class="col-sm-4 control-label" >Nro: </label>
  			<div class="col-sm-8">
  				<input name="num" type="text" class="form-control" id="numero" required placeholder="numero de expediente">
  			</div>
  		</div>
  		<div class="col-xs-6">
  			<label for="prioridad" class="col-sm-4 control-label" >Prioridad: </label>
  			<div class="col-sm-8">
  				<select class="form-control" id="sel1">
    				<option id="prioridad" required>Alta</option>
    				<option id="prioridad" required>Normal</option>
  				</select>
			</div>
  		</div>
	</div>
  	
  	<div class="form-group">
    	<div class="col-sm-offset-6 col-sm-4">
      		<button type="submit" class="btn btn-default">Agregar Trámite</button>
    	</div>
  	</div>
</form> 
			<!--.............................FIN NUEVO TRÁMITE .............................. !-->
	
