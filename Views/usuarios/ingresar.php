            <!--....................INICIO SESION................... .... !-->

<form class="form-horizontal container" onsubmit="return validar()" method="POST" action=" <?php echo URLM?>usuarios/ingresar">

  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label" >DNI</label>
    <div class="col-sm-10">
      <input name="username" type="text" class="form-control" id="inputEmail3" required placeholder=" Ingrese nombre de usuario">
      <p id="noingreso"></p>
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label" >Contraseña</label>
    <div class="col-sm-10">
      <input name="password" type="password" class="form-control" id="inputPassword3" required placeholder=" Ingrese contraseña">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label>
          <input name="recordarme" type="checkbox"> Recordarme
        </label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Ingresar</button>
    </div>
  </div>
</form>  <!--.............................FIN INICIO SESION .............................. !-->


<script type="text/javascript">
  function validar () {
    var dni,texto;
    dni=document.getElementById('inputEmail3').value;

    if (!(/^\d{8}$/.test(dni))) {
          texto ="Ingrese número de dni valido, si no esta registrado registrese";
          document.getElementById("noingreso").innerHTML = texto;
          //alert('[ERROR] El campo debe tener un valor de...');
          return false;
          }
    else return true;
  }
</script>