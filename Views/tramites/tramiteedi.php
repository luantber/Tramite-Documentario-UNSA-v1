<h3 class="text-center" >Trámite</h3>
<form class="form-horizontal" role="form">
	<div class="row container form-group">
		<div class="col-xs-6">
			<label for="numero" class="col-sm-4 control-label" >Nro: </label>
			<h5>8514865148651</h5>
		</div>
		
	</div>


		<div class="form-group">
			<label for="identificacion" class="col-sm-2 control-label" >Asunto:</label>
			<div class="col-sm-10">
				<input name="ident" type="text" class="form-control" id="identificacion" required placeholder="Cambiar el Asunto">
			</div>
		</div>

	  	<div class="row container form-group">
	    	<label for="text" class="col-lg-2 control-label">Estado:  </label>
	    	<h5>En Proceso</h5>
		</div>

		<div class="form-group">
			<label for="identificacion" class="col-sm-2 control-label" >Observaciones:</label>
			<div class="col-sm-10">
				<input name="ident" type="text" class="form-control" id="identificacion" required placeholder="Nueva Observaciones">
			</div>
		</div>



	  	<div class="row container form-group">
	    	<label  class="col-lg-2 control-label">Adjuntar Archivo:</label>


	    	<input id="input-ficons-2" name="inputficons2[]" multiple type="file" class="file-loading">
				<script>
				$("#input-ficons-2").fileinput({
				    uploadUrl: "/file-upload-batch/2",
				    uploadAsync: false,
				    previewFileIcon: '<i class="fa fa-file"></i>',
				    allowedPreviewTypes: null, 
				    previewFileIconSettings: {
				        'doc': '<i class="fa fa-file-word-o text-primary"></i>',
				        'xls': '<i class="fa fa-file-excel-o text-success"></i>',
				        'ppt': '<i class="fa fa-file-powerpoint-o text-danger"></i>',
				        'jpg': '<i class="fa fa-file-photo-o text-warning"></i>',
				        'pdf': '<i class="fa fa-file-pdf-o text-danger"></i>',
				        'zip': '<i class="fa fa-file-archive-o text-muted"></i>',
				        'htm': '<i class="fa fa-file-code-o text-info"></i>',
				        'txt': '<i class="fa fa-file-text-o text-info"></i>',
				        'mov': '<i class="fa fa-file-movie-o text-warning"></i>',
				        'mp3': '<i class="fa fa-file-audio-o text-warning"></i>',
				    },
				    previewFileExtSettings: {
				        'doc': function(ext) {
				            return ext.match(/(doc|docx)$/i);
				        },
	,
				        'ppt': function(ext) {
				            return ext.match(/(ppt|pptx)$/i);
				        },
				        'zip': function(ext) {
				            return ext.match(/(zip|rar|tar|gzip|gz|7z)$/i);
				        },

				        'txt': function(ext) {
				            return ext.match(/(txt|ini|md)$/i);
				        },
				        'mov': function(ext) {
				            return ext.match(/(avi|mpg|mkv|mov|mp4|3gp|webm|wmv)$/i);
				        },

				    }
				});
				</script>

		<nav>
			<ul class="pager">
				<li><a href="<?php echo URLM ?>/tramites">Cancelar</a></li>

			</ul>
		</nav>

		<div class="form-group">
	    	<div class="col-sm-offset-6 col-sm-4">
	      		<button  class="btn btn-default">Guardar Cambios</button>
	    	</div>
  		</div>
    	
	</div>
	    



</form>