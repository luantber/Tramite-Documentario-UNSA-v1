			<!--.............................NUEVO TRÁMITE .............................. !-->
<h2 class="text-center" >Nuevo Trámite</h2>
<form class="form-horizontal container">
	<div class="form-group" >
		<label for="in-tipo" class="col-sm-2 control-label">Tipo </label>
		<div class="col-sm-10" >
			<label class="radio-inline"><input type="radio" name="optradio" id="int-tipo">Persona Natural</label>			
			<label class="radio-inline"><input type="radio" name="optradio" id="int-tipo">Empresa/Institución</label>
		</div>		
	</div>

  <div class="form-group">
      <label for="institucion" class="col-sm-2 control-label" >Empresa/Institución </label>
      <div class="col-sm-10">
          <input name="inst" type="text" class="form-control" id="institucion" required placeholder=" Ingrese nombre de empresa/institución">
      </div>
  </div>
  

  <div class="form-group">
      <label for="identificacion" class="col-sm-2 control-label" >DNI </label>
      <div class="col-sm-10">
          <input name="ident" type="text" class="form-control" id="identificacion" required placeholder=" Ingrese DNI de usuario">
          <p id="noingreso" ></p>
      </div>
  </div>


  <div class="form-group">
      <label for="destino" class="col-sm-2 control-label" >Destino </label>
      <div class="col-sm-10">
          <input name="dest" type="text" class="form-control" id="destino" required placeholder=" Ingrese destino del documento">
      </div>
  </div>
	
  	<div class="form-group">
  		<label for="descripcion" class="col-sm-2 control-label" >Descripción </label>
  		<div class="col-sm-10" >
  			<input name="descrip" type="text" class="form-control" id="descripcion" required placeholder=" Ingrese número de indentifiación">
  		</div>
  	</div>

  	
  		<div class="form-group">
  			<label for="prioridad" class="col-sm-2 control-label" >Prioridad </label>
  			<div class="col-sm-10">
  				<select class="form-control" id="sel1">
    				<option id="prioridad" value="urgente" required>Urgente</option>
            <option id="prioridad" value="alta" required>Alta</option>
    				<option id="prioridad" value="alta" required>Normal</option>
  				</select>
			</div>
  		</div>
	   </div>

      <div class="row">
        <div class="col-md-8 col-md-offset-3">
          <label>Este documento esta siendo creado con fecha</label>
          <script>
            document.write(Date());
          </script>
        </div>
      </div>
  	
  	<div class="form-group">
    	<div class="col-sm-offset-6 col-sm-4">
      		<button type="button" onclick="validar()" class="btn btn-default">Agregar Trámite</button>
    	</div>
  	</div>

    <script>
    function validar () {
      var x, text;

    // Get the value of the input field with id="numb"
    x = document.getElementById("identificacion").value;

    // If x is Not a Number or less than one or greater than 10
    if (isNaN(x)) {
        text = "Ingrese un numero de 8 digitos";
    } else {
        text = "Input OK";
    }

    document.getElementById("noingreso").innerHTML = text;
    
    }</script>

    <p> </p>
    <p> .</p>
    <p> .</p>
    <p>Please input a number:</p>
<!--
<input id="numb">

<button type="button" onclick="myFunction()">Submit</button>

<p id="demo"></p>

<script>
function myFunction() {
    var x, text;

    // Get the value of the input field with id="numb"
    x = document.getElementById("numb").value;

    // If x is Not a Number or less than one or greater than 10
    if (isNaN(x)) {
        text = "Input not valid";
    } else {
        text = "Input OK";
    }
    document.getElementById("demo").innerHTML = text;
}
</script> !-->
<!--
    <script>

    function validar () {
      var valor;
      valor = document.getElementById("identificacion").value;

      if( !(/^\d{9}$/.test(valor)) ) {
        alert("Ingrese 8 digitos");
      }
          // body...
    }
    </script>

!-->

</form> 
			<!--.............................FIN NUEVO TRÁMITE .............................. !-->
	
