
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
<<<<<<< HEAD
		<tr>
			<td>1</td>
			<td>En Proceso</td>
			<td>
				<form>
				<h6>De:  </h6>
				<h6>Para:  </h6>
				<h6>Asunto:  </h6>
				</form>
			</td>
			<td>19/07/2016</td>
			<td>30/10/2020</td>
		</tr>
		<tr>
			<td>2</td>
			<td>Finalizado</td>
			<td>
				<form>
				<h6>De:  </h6>
				<h6>Para:  </h6>
				<h6>Asunto:  </h6>
				</form>
			</td>
			<td>19/07/2016</td>
			<td>30/07/2016</td>
		</tr>
		<tr>
			<td>3</td>
			<td>Rechazado</td>
			<td>
				<form>
				<h6>De:  </h6>
				<h6>Para:  </h6>
				<h6>Asunto:  </h6>
				</form>
			</td>
			<td>19/07/2016</td>
			<td>..........</td>
		</tr>
=======
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
				document.write("<td><a href='<?php echo URLM ?>empleados/crear'><span class='glyphicon glyphicon-envelope'></span></a>"+"</td>");
          document.write("<td><a href='<?php echo URLM ?>empleados/crear'><span class='glyphicon glyphicon-pencil'></span></a>"+"</td></tr>");
			}
		</script>
		
>>>>>>> master
	</tbody>
</table>



		

			<!--.............................FIN VER ESTADO .............................. !-->	
