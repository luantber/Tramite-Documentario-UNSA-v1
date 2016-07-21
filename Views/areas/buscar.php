	<!--............................. VER ESTADO .............................. !-->
		<!--............................. ESTO NO VA AÚN  .............................. !-->

<h2 class="text-center">Buscar Área</h2>

<form class="form-horizontal container">
	<div class="form-group" >
		<label for="buscar" class="col-sm-2 control-label">Buscar por: </label>
		<div class="col-sm-10" >
			<label class="radio-inline"><input type="radio" name="bus" id="buscar">Nombre</label>
			<label class="radio-inline"><input type="radio" name="bus" id="buscar">ID</label>			
		</div>		
	</div>
	
	<div class="form-group">
  		<label for="dato" class="col-sm-2 control-label" ></label>
  		<div class="col-sm-10" >
  			<input name="dat" type="text" class="form-control" id="dato" required placeholder=" Ingrese dato a buscar">
  		</div>
  	</div>

  	<div class="form-group">
    	<div class="col-sm-offset-2 col-sm-10">
    	    <a class="btn btn-primary" href="<?php echo URLM ?>/areas/mostrar" role="button">Ver área</a>
      		<!--<button type="submit" class="btn btn-default">Buscar Área</button>-->
    	</div>
  	</div>

	
</form>

			<!--.............................FIN VER ESTADO .............................. !-->	