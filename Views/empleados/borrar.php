<div  class="container">
<form method="post" action="<?php echo URLM ?>empleados/borrar">
<h2 class="text-center">Se eliminara a la siguiente empleado</h2>	
<div class ="container row">

            <div class="col-md-8 col-md-offset-4">
                <dl class="dl-horizontal">
                  <dt>Nombre</dt>
                    <dd>
                      <script type="text/javascript">
                        document.write(data.nombres);  
                      </script>
                    </dd>
                  <dt>Apellidos</dt>
                    <dd>
                      <script type="text/javascript">
                        document.write(data.apellidos);  
                      </script>
                    </dd>
                  <dt>DNI</dt>
                    <dd>
                      <script type="text/javascript">
                        document.write(data.dni);  
                      </script>
                    </dd>
                  <dt>E-mail</dt>
                    <dd>
                      <script type="text/javascript">
                        document.write(data.correo);  
                      </script>
                    </dd>
                    <dt>Área</dt>
                    <dd>
                      <script type="text/javascript">
                        document.write(data.nombre_area);  
                      </script>
                    </dd>
                    <dt>Cargo</dt>
                    <dd>
                      <script type="text/javascript">
                        document.write(data.nombre_cargo);  
                      </script>
                    </dd>
                    <dt>Estado</dt>
                    <dd>
                      <script type="text/javascript">
                        document.write(data.activo);  
                      </script>
                    </dd>
                  <br>  
                </dl>  
            </div>   
    <div>
    </div>  
  </div>

<div class="row">
  <div class="col-md-3 col-md-offset-5">
	<input type="submit" value="   Borrar Empleado   ">
  	
  </div>
</div>


	<input id="id" type="hidden" name="iduser" value="">


</form>
</div>

<script type="text/javascript">
	document.getElementById('id').value = idpersona;
</script>