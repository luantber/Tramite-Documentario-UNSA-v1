<div class="container">
	
<table class="table table-hover">
    <thead>
      <tr>
        <th><span class="glyphicon glyphicon-folder-open"></span></th>
        <th>Estado</th>
        <th>Datos</th>
        <th>Fecha de Inicio</th>
        <th>Fecha de Finalización</th>
        <th><span class="glyphicon glyphicon-envelope"></span> </th>
        <th><span class="glyphicon glyphicon-pencil"></span> </th>
        <th><span class="glyphicon glyphicon-trash"></span> </th>
      </tr>
    </thead>
	<tbody>
		<script type="text/javascript">
			var nuevo,tamanio;
			tamanio=data.length;
			for (var i=0;i<tamanio;i++){
                var posicion=tamanio-1

				nuevo=data[posicion-i];
				document.write("<tr><td>"+nuevo[0]+"</td>");
				document.write("<td>"+nuevo[4]+"</td>");
				document.write("<td><form><h6>"+"De: "+nuevo[10]+"</h6>");
				document.write("<h6>"+"Para: "+nuevo[12]+"</h6>");
				document.write("<h6>"+"Estado: "+nuevo[8]+"</h6></form></td>");
				document.write("<td>"+nuevo[1]+"</td>");//FECHA DE INICIO
				document.write("<td>"+nuevo[3]+"</td>");
				document.write("<td><a href='<?php echo URLM ?>tramites/ver/"+nuevo[0]+"'><span class='glyphicon glyphicon-envelope'></span></a>"+"</td>");
        		document.write("<td><a href='<?php echo URLM ?>empleados/crear'><span class='glyphicon glyphicon-pencil'></span></a>"+"</td>");
        		document.write("<td><a href='#'><span class='glyphicon glyphicon-trash'></span></a>"+"</td>");

        		/*checkbox
        		var str = "";
        		str += "<td><input type='checkbox'";
        		if (nuevo[nuevo.length-1] == "1") {
        			str+=" checked ";

        		} else {
        			str+=" ";
        		}
        		str+= "onclick='window.location.assign(`";
        		str+="<?php echo URLM ?>panel/recibido/";
        		str+=nuevo[0]+"`";
        		str+=")' /></td></tr>";

        		console.log(str);

        		document.write(str);*/

			}
		</script>
		
	</tbody>
</table>
</div>



		

			<!--.............................FIN VER ESTADO .............................. !-->	
