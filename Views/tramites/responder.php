<h2 class="text-center" >Responder Trámite</h2> 
<form class="form-horizontal container" method="POST" action="<?php  echo URLM."tramites/responder/55" ?>"> 

  <div class="form-group"> 
      <label for="cambio" class="col-sm-2 control-label" >Respuesta </label> 
      <div class="col-sm-10"> 
          <textarea name="cambio" rows="5" class="form-control" id="cambio" required placeholder=" Ingrese su respuesta">  </textarea> 
          <p id="noingreso" ></p> 
      </div> 
  </div> 
 
  <div class="form-group"> 
      <label for="obs" class="col-sm-2 control-label" > Observaciones </label> 
      <div class="col-sm-10" > 
        <textarea name="obs" class="form-control" rows="3" id="asunto" placeholder="Ingrese sus observaciones"></textarea> 
      </div> 
  </div> 
 
    <div class="form-group"> 
      <div class="text-center" > 
      <button type="submit" class="btn btn-default">Responder</button> 
      </div> 
    </div> 
 
    <p> </p> 
    <p> .</p> 
    <p> .</p> 
 
<?php  
//echo "<br>***desde: ".$asd;
?>
</form>   