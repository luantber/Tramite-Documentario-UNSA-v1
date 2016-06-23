
<div id="NewUsusario" class="azul-claro">
	<form action="<?php echo URLM; ?>empleados/registro" method="post"> 
		<fieldset>
			<h1 class="azul-oscuro">Usuario Nuevo</h1>	

			<label for="juser">Usuario</label>
			<input required type="text" id="juser" name="puser" placeholder="Ingrese nombre de Usuario"/>

			<label for="jpassword">Contraseña</label>
			<input required type="password" id="jpassword" name="ppassword" placeholder="Ingrese contraseña nueva"/>

			<label for="jpasswordc">Contraseña</label>
			<input required type="password" id="jpasswordc" name="ppasswordc" placeholder="Vuelva a ingresar contraseña"/>

			<label for="jname">Nombre</label>
			<input required type="text" id="jname" name="pname" placeholder="Ingrese nombre del Trabajador"/>

			<label for="jlastname">Apellidos</label>
			<input required type="text" id="jlastname" name="plastname" placeholder="Ingrese Apellido del Trabajador" />

			<label for="jdni">DNI</label>
			<input required type="text" id="jdni" name="pdni" minlength="8" maxlength="8" placeholder="Ingrese DNI del Trabajador"/>

			<label for="jemail">Email</label>
			<input required type="jemail" id="jemail" name="pemail" placeholder="Ingrese email del Trabajador">

			<label for="jgender">Género</label>
			<input class="genero" type="radio" id="jgender" name="pgender" value="femenino"> Femenino<br>
			<input class="genero" type="radio" id="jgender" name="pgender" value="masculino" checked>Masculino<br>

			<h3 class="azul-oscuro pequeno">Todos los campos son obligatorios </h3>

			<button type="submit">Registrar</button>
			<button type="">Cancelar</button>

			


		</fieldset>
	</form>
	
</div>

