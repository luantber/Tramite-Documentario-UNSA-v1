<h2 class="text-center" >Editar</h2>
<form class="form-horizontal container" method="POST" action=" <?php echo URLM?>empleados/editar">
  <div class="row container form-group">
      <div class="col-xs-6">
        <label for="nombree" class="col-sm-5 control-label" >Nombre</label>
        <div class="col-sm-7">
          <input name='nome' type='text' class='form-control' id='nombree'  required disabled="">
          
          
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
          <input name="dnie" type="text" class="form-control" id="dnie" required disabled="">
      </div>
  </div>

  <div class="form-group">
      <label for="email" class="col-sm-2 control-label" >correo</label>
      <div class="col-sm-10">
          <script type="text/javascript">
          if (sudo2==true){
            document.write("<input name='emaile' type='email' class='form-control' id='emaile' required>");          
          }
          else if (sudo==true) {
            document.write("<input name='emaile' type='email' class='form-control' id='emaile' required disabled>");          
          }
          else{
            document.write("<input name='emaile' type='email' class='form-control' id='emaile' required>");
          };

          </script>
      </div>
  </div>

  <div class="form-group">
      <label for="email" class="col-sm-2 control-label" >contraseña</label>
      <div class="col-sm-10">
          <script type="text/javascript">
          if(sudo2==true){
            document.write("<input placeholder='Ingrese nueva contraseña' name='password' type='password' class='form-control' id='passworde' required>");
          }
          else if (sudo==true) {
            document.write("<input  name='password' type='password' class='form-control' id='passworde' required disabled>");
          }
          else {
            document.write("<input placeholder='Ingrese nueva contraseña' name='password' type='password' class='form-control' id='passworde' required>");
          };

          </script>
      </div>
  </div>


  <div class="form-group ">
      <label for="campo" class="col-sm-2 control-label" >Área</label>
      <div class="col-sm-10">
      <script type="text/javascript">
      if (sudo==true){
        document.write("<select name='area' class='form-control' id='area'>");
      }
      else  {
        document.write("<select name='area' class='form-control' id='area' disabled>");
      }
      </script>
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
      </div>
  </div>


  <div class="form-group" >
      <label for="cargo" class="col-sm-2 control-label" >Cargo</label>
      <div class="col-sm-10">
        <script type="text/javascript">
          if (sudo==true) {
            document.write("<select name='cargo' class='form-control' id='cargo' >");
          }
          else{
            document.write("<select name='cargo' class='form-control' id='cargo' disabled>"); 
          }
        </script>
         
           <option value="">Seleccionar</option>
           <script type="text/javascript">
            //var cargo=["Jefe", "Encargado","Ayudante"]
            var nuevo,newo;
            for(var i=0;i<cargos.length;i++){
              nuevo=cargos[i];
              document.write("<option value="+nuevo[0]+">"+nuevo[1]+"</option>")
            }
            
           </script>
         </select>
      </div>
  </div>

  <input id="idee" type="hidden" name="id" value="">

  <div class="form-group">
      <label for="estado" class="col-sm-2 control-label" >Estado</label>
      <div class="col-sm-10">
        <script type="text/javascript">
        if (sudo==true){
          document.write("<input name='estado' type='text' class='form-control' id='estado' required >");
        }
        else  {
          document.write("<input name='estado' type='text' class='form-control' id='estado' required disabled>")
        }
        </script>
      </div>
  </div>

<!--
  <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-default">Guardar cambios</button>

      </div>
    </div>
-->
    <nav>
      <ul class="pager">
        <li><a href="<?php echo URLM ?>empleados">Cancelar</a></li>
        <button type="submit" class="btn btn-default">Guardar cambios</button>
      </ul>
    </nav>

</form>

<script >

  document.getElementById('idee').value=data.id;
  var newo;
  document.getElementById('nombree').value =data.nombres;
  document.getElementById('apellidoe').value=data.apellidos;
  document.getElementById('dnie').value=data.dni;
  document.getElementById('emaile').value=data.email;
  document.getElementById('passworde').value=data.password;
  document.getElementById('estado').value=data.activo;

    //para seleccionar las opciones .... xD !
//  document.getElementById("area").selectedIndex=data.id_area;

for(var en=0;cargos.length;en++){
    newo=cargos[en];
    if (data.id_cargo==newo[0]) {
      document.getElementById('cargo').selectedIndex=en+1; 
    }
}

</script>


<script type="text/javascript">
var ne;
for(var e=0;areas.length;e++){
    ne=areas[e];
    if (data.id_area==ne[0]) {
      document.getElementById('area').selectedIndex=e+1; 
    }
}
  
</script>


