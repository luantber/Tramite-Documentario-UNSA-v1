			<!--.............................NUEVO TRÁMITE .............................. !-->
<h2 class="text-center" >Nuevo Trámite</h2>
<form class="form-horizontal container" onsubmit="return validacion()"method="POST" action="<?php  echo URLM."tramites/crear" ?>">

  <div>
    <div class="form-group">
        <label for="tipo" class="col-sm-2 control-label" >Tipo </label>
        <div class="col-sm-10">
          <select name="tipo" class="form-control" id="tipo" >
            <option value="" >Seleccionar</option>
            <option value="1" required>Persona Natural</option>
            <option value="2" required>Empresa/institución</option>
          </select>
          <p id="notipo" ></p>
      </div>
      </div>
     </div>

  <div class="form-group">
      <label for="institucion" class="col-sm-2 control-label" id="nuevocampo" >Empresa/Institución</label>
      <div class="col-sm-10">
          <input name="inst" type="text" class="form-control" id="institucion" placeholder=" Ingrese solo en caso de institución">
          <p id="inst" ></p>
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
        <label for="destino" class="col-sm-2 control-label" >Destino</label>
        <div class="col-sm-10">
          <select name="destino" class="form-control" id="destino">
            <option value="" >Seleccionar</option>
            <script type="text/javascript">
              var opciones=["logistica","secretaria","Dirección Academica","Sistemas"];
              for (var i=0;i<opciones.length;i++){
                document.write("<option value='" +i+"'>"+opciones[i]+"</option>")
              }
            </script>
          </select>
          <p id="nodestino" ></p>
      </div>
      </div>
	
  	<div class="form-group">
  		<label for="descripcion" class="col-sm-2 control-label" >Descripción </label>
  		<div class="col-sm-10" >
  			<input name="descrip" type="text" class="form-control" id="descripcion" required placeholder=" Ingrese pequeña descripción">
  		</div>
  	</div>

    <div class="form-group">
      <label for="folios" class="col-sm-2 control-label" >Nro de Folios</label>
      <div class="col-sm-10" >
        <input name="folios" type="number" class="form-control" id="folios" required placeholder=" Ingrese número de folios">
      </div>
    </div>

  	
  		<div class="form-group">
  			<label for="prioridad" class="col-sm-2 control-label" >Prioridad </label>
  			<div class="col-sm-10">
  				<select name="prioridad"  class="form-control" id="opciones">
            <option value="" >Seleccionar</option>
    				<option value="urgente" required>Urgente</option>
            <option value="alta" required>Alta</option>
    				<option value="alta" required>Normal</option>
  				</select>
          <p id="nopcion" ></p>
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
      		<button type="submit" class="btn btn-default">Agregar Trámite</button>
    	</div>
  	</div>



    <script>
      function validacion() {
        var dni,indice,tipo,destino;//elemento= tipo de empresa
        dni = document.getElementById('identificacion').value;
        indice = document.getElementById("opciones").selectedIndex;
        tipo = document.getElementById("tipo").selectedIndex;
        destino = document.getElementById("destino").selectedIndex;

        if (tipo == null || tipo == 0) {
          texto="Seleccione tipo";
          document.getElementById("notipo").innerHTML = texto;
          return false;
        }
        else if (!(/^\d{8}$/.test(dni))) {
          texto ="Ingrese un numero de 8 digitos";
          document.getElementById("noingreso").innerHTML = texto;
          //alert('[ERROR] El campo debe tener un valor de...');
          return false;
          }

        else if (destino ==null || destino == 0){
          texto="Seleccione un destino";
          document.getElementById("nodestino").innerHTML = texto;
          return false;
        }

        else if( indice == null || indice == 0 ) {
          texto="Seleccione una prioridad";
          document.getElementById("nopcion").innerHTML = texto;
          return false;
          }

        else return true;
        }
    </script>

    <p> </p>
    <p> .</p>
    <p> .</p>

</form> 
			<!--.............................FIN NUEVO TRÁMITE .............................. !-->
