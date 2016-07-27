
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
                        if (data.email==null) {
                          document.write("Ninguno");  
                        }
                        else {
                        document.write(data.email);  
                          
                        }
                      </script>
                    </dd>
                    <dt>Área</dt>
                    <dd>
                      <script type="text/javascript">
                        if (data.area==null) {
                          document.write("No disponible");  
                        }
                        else  {
                        document.write(data.area);  
                          
                        }
                      </script>
                    </dd>
                    <dt>Cargo</dt>
                    <dd>
                      <script type="text/javascript">
                        if (data.cargo==null) {
                          document.write("No disponible");  
                        }
                        else  {

                        document.write(data.cargo);  
                        }
                      </script>
                    </dd>
                    <dt>Estado</dt>
                    <dd>
                      <script type="text/javascript">
                      if (data.activo==null) {
                        document.write("No disponible");
                      }
                      else  {

                        document.write(data.activo);  
                      }
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
          if (editar==true) {
            document.write("<a href='<?php echo URLM ?>usuarios/editar/"+data.id+"''>Editar</a>")  
          }
          else{
            document.write("<a href='<?php echo URLM ?>empleados/editar/"+data.id+"''>Editar</a>")
          }
      </script>        
      </ul>
    </nav>
