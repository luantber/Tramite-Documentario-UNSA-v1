<h2 class="text-center" >Responder Trámite</h2> 

<form id="form" class="form-horizontal container" method="POST" action="<?php  echo URLM."tramites/responder/" ?>" enctype="multipart/form-data"> 

  <div class="form-group">
      <label for="archivo" class="col-sm-2 control-label">Respuesta</label>
      <div class="col-sm-10">
        <input id="archivo" name="archivo" type="file" class="file" data-show-preview="false" required>
        <script type="text/javascript">
          $("#archivo").fileinput(
          {
            showUpload:false,
            language: 'es',
            allowedFileExtensions: ["doc","docx","odt"],
            maxFilesNum: 1
          });
        </script>
      </div>
       
    <div class="form-group"> 
      <div class="text-center" > 
      <button type="submit" class="btn btn-default">Responder</button> 
      </div> 
    </div> 
 
</form>   

<script type="text/javascript">
  document.getElementById("form").action += data[0];
</script>