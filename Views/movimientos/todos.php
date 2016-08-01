
<div class="container">

  <h2>Todos los movimientos</h2>           
  <table class="table table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>Expediente</th>
        <th>Remitente</th>
        <th>Destino</th>
        <th>Estado</th>
        <th>Persona</th>
        <th>Fecha</th>
    


      </tr>
    </thead>
    <tbody>

      <script type="text/javascript">
        var nuevo,tamanio;
        tamanio=data.length;
        for (var i=0;i<tamanio;i++){
          nuevo=data[i];
          document.write("<tr><td>"+nuevo[0]+"</td>");
          document.write("<td>"+nuevo[1]+"</td>");
          document.write("<td>"+nuevo[2]+"</td>");
          document.write("<td>"+nuevo[3]+"</td>");
          document.write("<td>"+nuevo[4]+"</td>");
          document.write("<td>"+nuevo[5]+"</td>");
          document.write("<td>"+nuevo[6]+"</td></tr>");
        }
      </script>
    </tbody>
  </table>
</div>