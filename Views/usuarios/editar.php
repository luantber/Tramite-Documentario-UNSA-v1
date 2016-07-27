<h2 class="text-center" >Editar</h2>
<form class="form-horizontal container" method="POST" action=" <?php echo URLM?>usuarios/editar">
  <div class="row container form-group">
      <div class="col-xs-6">
        <label for="nombree" class="col-sm-5 control-label" >Nombre</label>
        <div class="col-sm-7">
        <script type="text/javascript">
          if (asuario==true) {
            document.write("<input name='nome' type='text' class='form-control' id='nombree'  required >");
          }
          else{
            document.write("<input name='nome' type='text' class='form-control' id='nombree'  required disable>");
          }
        </script>
          
        </div>
      </div>
      <div class="col-xs-6">
        <label for="apellidoe" class="col-sm-4 control-label" >Apellidos</label>
        <div class="col-sm-8">
          <input name="apee"type="text" class="form-control" id="apellidoe"  required disabled="">
        </div>
      </div>
  </div>

  <div class="form-group">
      <label for="dni" class="col-sm-2 control-label" >DNI</label>
      <div class="col-sm-10">
        <script type="text/javascript">
        if (usuario) {
          document.write("<input name=''dnie' type='text' class='form-control' id='dnie' required >");
        }
        else{
          document.write("<input name='dnie' type='text' class='form-control' id='dnie' required disabled>");
        }
        </script>
          
      </div>
  </div>

  <div class="form-group">
      <label for="email" class="col-sm-2 control-label" >correo</label>
      <div class="col-sm-10">
          <script type="text/javascript">
          if (usuario==true) {
            document.write("<input name='emaile' type='email' class='form-control' id='emaile' required >");          
          }
          else{
            document.write("<input name='emaile' type='email' class='form-control' id='emaile' required >");
          };

          </script>
      </div>
  </div>

  <div class="form-group">
      <label for="email" class="col-sm-2 control-label" >contraseña</label>
      <div class="col-sm-10">
          <script type="text/javascript">
          if (usuario==true ) {
            document.write("<input  name='password' type='password' class='form-control' id='passworde' required disabled>");
          }
          else  {
            document.write("<input placeholder='Ingrese nueva contraseña' name='password' type='password' class='form-control' id='passworde' required>");
          };

          </script>
      </div>
  </div>


  <input id="idee" type="hidden" name="id" value="">

    <nav>
      <ul class="pager">
        <li><a href="<?php echo URLM ?>usuarios">Cancelar</a></li>
        <button type="submit" class="btn btn-default">Guardar cambios</button>
      </ul>
    </nav>

</form>

<script >

  document.getElementById('idee').value=data.id;
  document.getElementById('nombree').value =data.nombres;
  document.getElementById('apellidoe').value=data.apellidos;
  document.getElementById('dnie').value=data.dni;
  document.getElementById('emaile').value=data.email;
  document.getElementById('passworde').value=data.password;

</script>

