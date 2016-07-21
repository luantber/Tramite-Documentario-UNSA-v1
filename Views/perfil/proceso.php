<nav class="navbar navbar-default ">

  <div class="container-fluid">
    <div class="navbar-header">
      <!--<a class="navbar-brand active" href="#">Perfil</a>-->
      <a class="navbar-brand" href="<?php echo URLM ?>/perfil/barrita">Perfil</a>
    </div>
 
    <ul class="nav navbar-nav active">
      <!--<li ><a href="<?php echo URLM ?>/perfil/barrita">Mi perfil</a></li>-->
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Mis trámites
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
 
          <li><a href="<?php echo URLM ?>/perfil/MiTramite">Todos</a></li>
          <li class="active"><a href="<?php echo URLM ?>/perfil/proceso">En proceso</a></li>
          <li><a href="<?php echo URLM ?>/perfil/finalizado">Finalizados</a></li>
          <li><a href="<?php echo URLM ?>/perfil/rechazado">Rechazados</a></li>
 
        </ul>
      </li>
      <li><a href="#">Ayuda</a></li>
    </ul>
 
  </div>
</nav>

<div class="container">
  <h2>Mis Trámites</h2>  
           
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Estado</th>
        <th>Tramite</th>
        <th>Inicio</th>
        <th>Finaliza</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>En proceso</td>
        <td>Acta</td>
        <td>16/06/16</td>
        <td>17/08/16</td>
      </tr>
      <tr>
        <td>En proceso</td>
        <td>Documento</td>
        <td>03/04/16</td>
        <td>22/07/16</td>
      </tr>
    </tbody>
  </table>
</div>