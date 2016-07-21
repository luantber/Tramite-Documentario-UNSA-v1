<h2 class="text-center">Nueva Área</h2>
 <form role="form" class="form-horizontal container">

  <div class="form-group">

<!--HEAD
    <label for="area">Area:</label>
    <input type="text" name="area" class="form-control" id="area">
 -->

    <label for="area" class="col-sm-2 control-label">Área </label>
    <div class="col-sm-10" >
    	<input name="nuevaArea" type="text" class="form-control " id="area"required placeholder ="Ingrese nombre de nueva área">
    </div>
<!-->>>>>>> master-->
  </div>

  <div class="form-group">
<!--<<<<<<< HEAD
    <label for="person">Creado por:</label>
    <input type="text" name="persona" class="form-control" id="person">
 =======-->

    <label for="person" class="col-sm-2 control-label">Jefe de Área </label>

    <div class="col-sm-10" >
    <input name="jefeArea" type="text" class="form-control" id="person" required placeholder="Ingrese nombre de nuevo jefe">
    </div>
  </div>

  <div class="form-group">
    <label for="person" class="col-sm-2 control-label">Descripción </label>
    <div class="col-sm-10" >
    <input name="desArea" type="text" class="form-control" id="person" required placeholder="Ingrese descripción acerca de la nueva área">
    </div>
<!-->>>>>>> master-->
  </div>

   <div class="form-group">
  	
  	<label for="descrip" class="col-sm-2 control-label">Descripción del área:</label>
  	<div class="col-sm-10" >
  	<textarea class="form-control" rows="3" id="descrip"></textarea>
    </div>
   </div>

   <div class="form-group " >
  	<div class="col-sm-offset-2 col-sm-10">
  		<button type="submit" class="btn btn-default">Crear nueva área</button>
  	</div>
  </div>

</form>