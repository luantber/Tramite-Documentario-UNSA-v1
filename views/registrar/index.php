<div id="Cliente" class="azul-claro">
	
	<form action="#" method="post"> 
		<fieldset>
			<h1 class="azul-oscuro">Cliente Nuevo</h1>	

			<label for="name">Nombre</label>
			<input required type="text" id="name" placeholder="Ingrese nombre del cliente"/>

			<label for="lastname">Apellidos</label>
			<input required type="text" id="lastname" placeholder="Ingrese Apellido del cliente" />

			<label for="dni">DNI</label>
			<input required type="text" id="dni" minlength="8" maxlength="8" placeholder="Ingrese DNI del cliente"/>

			<label for="email">Email</label>
			<input required type="email" id="email" placeholder="Ingrese email del cliente">

			<label for="gender">Género</label>
			<input type="radio" name="gender" value="femenino"> Femenino<br>
			<input type="radio" name="gender" value="masculino" checked>Masculino<br>

			<h3 class="azul-oscuro pequeno">Todos los campos son obligatorios </h3>

			<button type="subimit">Registrar</button>
			<button type="">Cancelar</button>


			


		</fieldset>
	</form>
	
</div>

