<div class="container">
	
<form>
	
		<div class="row">
			<div class="col-md-6">
				<label for="identificacion" class="col-sm-2 control-label" >ID Trámite:</label>
				<div class="col-sm-6">
					<input name="idtra" type="text" class="form-control"  required placeholder="Ponga el ID del Trámite">
				</div>
			</div>
			
			<div class="col-md-6">
				<label for="identificacion" class="col-sm-2 control-label" >DNI:</label>
				<div class="col-sm-6">
					<input name="dniusu" type="number" class="form-control"  required placeholder="">
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-6">
				<label for="identificacion" class="col-sm-2 control-label" >Remitente:</label>
				<div class="col-sm-6">
					<input name="idtra" type="text" class="form-control"  required placeholder="Remitente">
				</div>
			</div>
			
			<div class="col-md-6">
				<label for="identificacion" class="col-sm-2 control-label" >Destino:</label>
				<div class="col-sm-6">
					<input name="dniusu" type="number" class="form-control"  required placeholder="">
				</div>
			</div>
		</div>

		<div class="col-md-6">
			<label for="identificacion" class="col-sm-2 control-label" >Asunto:</label>
			<div class="col-sm-6">
				<input name="idtra" type="text" class="form-control">
			</div>
		</div>

  		<div class="form-group">
  			<label for="prioridad" class="col-sm-2 control-label" >Prioridad </label>
  			<div class="col-sm-10">
  				<select name="prioridad"  class="form-control" id="opciones">
            <option value="" >Seleccionar</option>
    				<option value="urgente" required>Urgente</option>
            <option value="alta" required>Alta</option>
    				<option value="alta" required>Normal</option>
  				</select>
          <p id="nopcion" ></p>
			</div>
  		</div>
</form>
</div>