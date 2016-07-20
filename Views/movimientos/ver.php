<h2 class="text-center">Trámite</h2>
<form class="form-horizontal container">
  <div class="form-group" >
    <label for="movi" class="col-sm-2 control-label">Buscar por: </label>
    <div class="col-sm-10" >
      <label class="radio-inline"><input type="radio" name="bus" id="movi">Nombre</label>
      <label class="radio-inline"><input type="radio" name="bus" id="movi">Id</label>
    </div>    
  </div>
  
  <div class="form-group">
      <label for="busca" class="col-sm-2 control-label" ></label>
      <div class="col-sm-10" >
        <input name="dat" type="text" class="form-control" id="busca" required placeholder="">
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-default">Ver movimientos</button>
      </div>
    </div>
</form>