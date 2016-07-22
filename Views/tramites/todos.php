
<nav role="navigation" class="navbar navbar-inverse">
	<ul class="nav nav-tabs">
		<li class="active"><a href="<?php echo URLM ?>/tramite/todos">Todos</a></li>
		<li ><a href="<?php echo URLM ?>/tramite/proceso">En Proceso</a></li>
		<li ><a href="<?php echo URLM ?>/tramite/finalizados">Finalizados</a></li>
		<li ><a href="<?php echo URLM ?>/tramite/rechazados">Rechazados</a></li>
	</ul>
</nav>

<table class="table table-hover">
    <thead>
      <tr>
        <th><span class="glyphicon glyphicon-folder-open"></span></th>
        <th>Estado</th>
        <th>Datos</th>
        <th>Fecha de Inicio</th>
        <th>Fecha de Finalización</th>
      </tr>
    </thead>
	<tbody>
		<script type="text/javascript">
			var nuevo,tamanio;
			tamanio=data.length;
			for (var i=0;i<tamanio;i++){
				nuevo=data[i];
				document.write("<tr><td>"+nuevo[0]+"</td>");
				document.write("<td>"+nuevo[4]+"</td>");
				document.write("<td><form><h6>"+"De: "+nuevo[5]+"</h6>");
				document.write("<h6>"+"Para: "+nuevo[7]+"</h6>");
				document.write("<h6>"+"Estado: "+nuevo[8]+"</h6></form></td>");
				document.write("<td>"+nuevo[2]+"</td>");
				document.write("<td>"+nuevo[3]+"</td>");
				document.write("<td><a href='<?php echo URLM ?>tramites/asignar'><span class='glyphicon glyphicon-envelope'></span></a>"+"</td>");
        		document.write("<td><a href='<?php echo URLM ?>empleados/crear'><span class='glyphicon glyphicon-pencil'></span></a>"+"</td></tr>");
        		document.write("<td><a href='#'><span class='glyphicon glyphicon-trash'></span></a>"+"</td>");
			}
		</script>
		
	</tbody>
</table>



		

			<!--.............................FIN VER ESTADO .............................. !-->	
