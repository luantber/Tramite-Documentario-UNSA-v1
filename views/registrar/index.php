<a href="<?php echo URLM; ?>empleados/ver">Click</a>
<div id="Cliente" class="azul-claro">
	<form action="<?php echo URLM; ?>empleados/ver" method="post"> 
		<fieldset>
			<h1 class="azul-oscuro">Cliente Nuevo</h1>	

			<label for="jname">Nombre</label>
			<input required type="text" id="jname" name="pname" placeholder="Ingrese nombre del cliente"/>

			<label for="jlastname">Apellidos</label>
			<input required type="text" id="jlastname" name="plastname" placeholder="Ingrese Apellido del cliente" />

			<label for="jdni">DNI</label>
			<input required type="text" id="jdni" name="pdni" minlength="8" maxlength="8" placeholder="Ingrese DNI del cliente"/>

			<label for="jemail">Email</label>
			<input required type="jemail" id="jemail" name="pemail" placeholder="Ingrese email del cliente">

			<label for="jgender">Género</label>
			<input type="radio" id="jgender" name="pgender" value="femenino"> Femenino<br>
			<input type="radio" id="jgender" name="pgender" value="masculino" checked>Masculino<br>

			<h3 class="azul-oscuro pequeno">Todos los campos son obligatorios </h3>

			<button type="submit">Registrar</button>
			<button type="">Cancelar</button>


			


		</fieldset>
	</form>
	
</div>

