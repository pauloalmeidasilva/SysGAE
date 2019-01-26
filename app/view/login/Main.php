<div class="container-fluid">
	<div class="row">
		<div class="col-sm-3 shadow-lg" style='background-color: #fff; position: absolute; height: 100%; padding-top: 175px;'>
	        <form action="<?php echo DIRPAGE.'login/autenticar'; ?>" method="post">
	        	<div class="form-group">
	        		<label for="user-prontuario">Prontuário</label>
	        		<input type="text" class="form-control" name="user-prontuario">
	        	</div>
	        	<div class="form-group">
	        		<label for="user-prontuario">Senha</label>
	        		<input type="password" class="form-control" name="user-senha">
	        	</div>
				<button type="submit" class="btn btn-success mx-auto d-block" style="width: 100px;">Iniciar</button>
	        </form>
	    </div>
		<div class="col-sm-9 offset-sm-3">
			<img class="rounded mx-auto d-block" src="logo.png" alt="" style="">
    	</div>
    </div>
</div>