
<!--  PERFIL  -->
 

 
<nav class="navbar navbar-default ">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand active" href="#">Perfil</a>
    </div>
 
    <ul class="nav navbar-nav active">
      <li class="active"><a href="<?php echo URLM ?>/perfil/barrita">Mi perfil</a></li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Mis trámites
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
 
          <li><a href="<?php echo URLM ?>/perfil/MiTramite">Todos</a></li>
          <li><a href="<?php echo URLM ?>/perfil/proceso">En proceso</a></li>
          <li><a href="<?php echo URLM ?>/perfil/finalizado">Finalizados</a></li>
          <li><a href="<?php echo URLM ?>/perfil/rechazado">Rechazados</a></li>
 
        </ul>
      </li>
      <li><a href="#">Ayuda</a></li>
    </ul>
  </div>
</nav>

 
<div class ="container">
   <div class="form-group">
 
      <br>
        <div class="row">
            <div class="col-sm-3">
               <a href="#" class="thumbnail">
                <img src="perfil/int.jpg" alt="usuario" class="img-circle">
               </a>
           </div>
 
            <div class="col-sm-9">
                <dl class="dl-horizontal">
                  <dt>Nombre</dt>
                    <dd>Mostrar Nombre</dd>
                  <dt>Apellidos</dt>
                    <dd>Mostrar Apellidos</dd>
                  <dt>DNI</dt>
                    <dd>73698214</dd>
                  <dt>Telefono</dt>
                    <dd>997766582</a></dd>
                    <!--<dd><a  href="#" id="stdid">997766582</a></dd>-->
                  <dt>E-mail</dt>
                    <dd>correo@hotmail.com</a></dd>
                    <!--<dd><a href="#" id="stdemail">correo@hotmail.com</a></dd>-->
                  <dt>Dirección</dt>
                    <dd>Av.Calle Siempreviva</dd>
 
                  <br>  
                  <dt><button type="submit" class="btn btn-default">Editar</button></dt>  
                  <dd><button type="submit" class="btn btn-default">Guardar</button></dd>  
                </dl>  
            </div>  
          </div>  
       </div>  
    </div>  
  </div>