
<div class="container">
  <h2>Áreas</h2>           
  <table class="table table-hover">
    <thead>
      <tr>

        <th>ID</th>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Jefe</th>
        <th><span class="glyphicon glyphicon-pencil"></span> Editar</th>
        <th><span class="glyphicon glyphicon-trash"></span> Eliminar</th>
      
      </tr>
    </thead>
    <tbody>
     <script type="text/javascript">
     var nuevo,tamanio;
     tamanio=areas.length;
     for(var i =0; i<tamanio;i++){
      nuevo=areas[i];
      document.write("<tr><td>"+nuevo[0]+"</td>");
      document.write("<td>"+nuevo[1]+"</td>");
      document.write("<td>"+nuevo[2]+"</td>");
      document.write("<td>"+nuevo[3]+"</td>");
      document.write("<td><a href='<?php echo URLM ?>areas/crear'><span class='glyphicon glyphicon-pencil'></span></a>"+"</td>");
      document.write("<td><a href='#'><span class='glyphicon glyphicon-trash'></span></a>"+"</td></tr>");
     }
     </script>
    </tbody>
  </table>
</div>