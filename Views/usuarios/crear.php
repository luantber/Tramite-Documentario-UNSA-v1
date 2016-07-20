<form class="form-horizontal container" method="POST" action=" <?php echo URLM ?>usuarios/Crear">
  <div class="row container form-group">
      <div class="col-xs-6">
        <label for="nombreusu" class="col-sm-5 control-label" >Nombre</label>
        <div class="col-sm-7">
          <input name="nomusu" type="text" class="form-control" id="nombreusu" required placeholder="Ingrese nombre de usuario">
        </div>
      </div>
      <div class="col-xs-6">
        <label for="apellidousu" class="col-sm-4 control-label" >Apellidos</label>
        <div class="col-sm-8">
          <input name="apeusu"type="text" class="form-control" id="apellidousu" required placeholder="Ingrese apellidos de usuario">
        </div>
      </div>
  </div>

  <div class="form-group">
      <label for="dni" class="col-sm-2 control-label" >DNI</label>
      <div class="col-sm-10">
          <input name="dniusu" type="text" class="form-control" id="dni" required placeholder=" Ingrese número de DNI">
      </div>
  </div>
<!-- Comentado por ahora
  <div class="form-group">
      <label for="contrasñausu" class="col-sm-2 control-label" >Contraseña</label>
      <div class="col-sm-10">
          <input name="contrausu" type="text" class="form-control" id="contraseñausu" required placeholder="Escriba 123456">
      </div>
  </div>
-->

  <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-default">Registrar Usuario</button>
      </div>
    </div>
</form>