
<!--  PERFIL  -->

<div class ="container row">

            <div class="col-md-8 col-md-offset-5">
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
                        document.write(data.email);  
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

<nav>
      <ul class="pager">
        <script type="text/javascript">
          document.write("<a href='<?php echo URLM ?>empleados/editar/"+data.id+"''>Editar</a>")
      </script>        
      </ul>
    </nav>
