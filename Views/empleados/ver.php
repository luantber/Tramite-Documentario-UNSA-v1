<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
}
</style>

<table style="width:100%">
  <tr>
    <th>Firstname</th>
    <th>Lastname</th>
    <th>DNI</th>
  </tr>
  <tr>
    <td id="tname">Jill</td>
    <td id="tapellido">Smith</td>
    <td id="tdni">50</td>
  </tr>
</table>

<script>
var obj = JSON.parse(datos);
document.getElementById("tname").innerHTML = obj.name; 
document.getElementById("tapellido").innerHTML = obj.lastname; 
document.getElementById("tdni").innerHTML = obj.dni; 
</script>


