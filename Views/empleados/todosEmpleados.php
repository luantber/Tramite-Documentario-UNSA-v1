<h2 class="text-center">
<script type="text/javascript">
document.write(title);
</script></h2>
<div class="container">
  <table class="table table-striped">
  <thead>
      <tr>
        <th>ID</th>
        <th>DNI</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Área</th>
        <th>Cargo</th>
        <th>Estado</th>
        <th>E-mail</th>
        <!--<th><li><a href="<?php echo URLM ?>empleados/crear">Registar</a></li></th>!-->
        <th><span class="glyphicon glyphicon-user"></span> </th>
        <th><span class="glyphicon glyphicon-trash"></span> </th>
      </tr>
    </thead>

    <tbody>      
      <script type="text/javascript">
        var nuevo,tamanio;
        //nuevo=data[0];
        tamanio=data.length; 
        for(var i=0; i<tamanio;i++){
          nuevo=data[i];
          document.write("<tr><td>"+nuevo[0]+"</td>");
          document.write("<td>"+nuevo[1]+"</td>");
          document.write("<td>"+nuevo[2]+"</td>");
          document.write("<td>"+nuevo[3]+"</td>");
          document.write("<td>"+nuevo[6]+"</td>");
          document.write("<td>"+nuevo[8]+"</td>");
          document.write("<td>"+nuevo[9]+"</td>");
          document.write("<td>"+nuevo[10]+"</td>");
          document.write("<td><a href='<?php echo URLM ?>personas/Ver/"+nuevo[0]+"'><span class='glyphicon glyphicon-user'></span></a>"+"</td>");
          document.write("<td><a href='<?php echo URLM ?>personas/eliminar/"+ nuevo[0] +"'><span class='glyphicon glyphicon-trash'></span></a>"+"</td></tr>");
        }
      </script>

    <div class="container">
      <ul class="pagination">
        <li><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">5</a></li>
      </ul>
    </div>
    </tbody>
  </table>
</div>
