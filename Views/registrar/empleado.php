
<form class="form-horizontal container"  method="POST" action=" <?php echo URLM?>registrar/empleado">
  <div class="row container form-group">
      <div class="col-xs-6">
        <label for="nombree" class="col-sm-5 control-label" >Nombre</label>
        <div class="col-sm-7">
          <input name="nome" type="text" class="form-control" id="nombree"  required placeholder="Ingrese nombre de trabajador">
        </div>
      </div>
      <div class="col-xs-6">
        <label for="apellidoe" class="col-sm-4 control-label" >Apellidos</label>
        <div class="col-sm-8">
          <input name="apee"type="text" class="form-control" id="apellidoe"  required placeholder="Ingrese apellidos de trabajador">
        </div>
      </div>
  </div>

  <div class="form-group">
      <label for="dni" class="col-sm-2 control-label" >DNI</label>
      <div class="col-sm-10">
          <input name="dnie" type="text" class="form-control" id="dni" required placeholder=" Ingrese número de DNI">
      </div>
  </div>

  <div class="form-group">
      <label for="usuario" class="col-sm-2 control-label" >Usuario</label>
      <div class="col-sm-10">
          <input name="contrae" type="text" class="form-control" id="usuario" required placeholder="Ingrese nombre de Usuario">
      </div>
  </div>

  <div class="form-group">
      <label for="contrasñausu" class="col-sm-2 control-label" >Contraseña</label>
      <div class="col-sm-10">
          <input name="contrae" type="password" class="form-control" id="contraseñausu" required placeholder="Escriba 123456">
      </div>
  </div>

  <div class="form-group">
      <label for="campo" class="col-sm-2 control-label" >Área</label>
      <div class="col-sm-10">
          <input name="camp" type="text" class="form-control" id="campo" required placeholder="Ingrese al área a la que pertenece">
      </div>
  </div>



  <div class="form-group">
      <label for="cargo" class="col-sm-2 control-label" >Cargo</label>
      <div class="col-sm-10">
          <input name="carg" type="text" class="form-control" id="cargo" required placeholder="Ingrese Cargo">
      </div>
  </div>


  <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-default">Registrar Empleado</button>
      </div>
    </div>
</form>