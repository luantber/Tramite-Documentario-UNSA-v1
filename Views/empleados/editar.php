<h2 class="text-center" >Editar Empleado</h2>
<form class="form-horizontal container"  method="POST" action=" <?php echo URLM?>empleados/crear">
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
          <input name="dnie" type="text" class="form-control" id="dnie" required placeholder=" Ingrese número de DNI">
      </div>
  </div>

  <div class="form-group">
      <label for="email" class="col-sm-2 control-label" >correo</label>
      <div class="col-sm-10">
          <input name="emaile" type="email" class="form-control" id="emaile" required placeholder="Ingrese correo del empleado">
      </div>
  </div>

  <div class="form-group">
      <label for="email" class="col-sm-2 control-label" >contraseña</label>
      <div class="col-sm-10">
          <input name="password" type="password" class="form-control" id="passworde" required placeholder="Ingrese nueva contraseña">
      </div>
  </div>


  <div class="form-group">
      <label for="campo" class="col-sm-2 control-label" >Área</label>
      <div class="col-sm-10">
        <select name="area" class="form-control" id="area" >
            <option value="" >Seleccionar</option>
            <script type="text/javascript">
              //var opciones=["Mesa de partes","Logistíca","Secretaria"]
              var nuevo;
              for (var i=0;i<areas.length;i++){
                nuevo=areas[i];
                document.write("<option value="+nuevo[0]+">"+nuevo[1]+"</option>")
              }
            </script> 
          </select>
      <script >
        document.write("<p><b>Área actual "+data.email+"</b></p>")
      </script>
      </div>
  </div>

  <script type="text/javascript">
$(document).ready(function(){
    $('#area > option[value="3"]').attr('selected', 'selected');
});
</script>



  <div class="form-group">
      <label for="cargo" class="col-sm-2 control-label" >Cargo</label>
      <div class="col-sm-10">
         <select name="cargo" class="form-control">
           <option value="">Seleccionar</option>
           <script type="text/javascript">
            //var cargo=["Jefe", "Encargado","Ayudante"]
            var nuevo;
            for(var i=0;i<cargos.length;i++){
              nuevo=cargos[i];
              document.write("<option value="+nuevo[0]+">"+nuevo[1]+"</option>")
            }
           </script>
         </select>
        <script >
        document.write("<p><b>Cargo actual "+data.nombre_cargo+"</b></p>")
      </script>
      </div>
  </div>


  <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-default">Guardar cambios</button>
      </div>
    </div>
</form>


<script >
  document.getElementById('nombree').value =data.nombres;
  document.getElementById('apellidoe').value=data.apellidos;
  document.getElementById('dnie').value=data.dni;
//  document.getElementById('area').value=data.dni;

</script>