<div class="container-fluid">
	<div class="row">
		<div class="col-sm-3 shadow-lg" style='background-color: #fff; position: absolute; height: 100%; padding-top: 175px;'>
	        <form action="<?php echo DIRPAGE.'login/autenticar'; ?>" method="post">
	        	<h3 class="text-center">Login</h3>

	        	<br>
	        	<input type="text" class="form-control" name="prontuario" placeholder="Prontuário">
	        	<br>
				<input type="password" class="form-control" name="senha" placeholder="Senha">
				<br>
				<button type="submit" class="btn btn-success mx-auto d-block" style="width: 100px;">Iniciar</button>
	        </form>
	    </div>
		<div class="col-sm-9 offset-sm-3">
			<img class="rounded mx-auto d-block" src="logo.png" alt="" style="">
    	</div>
    </div>
</div>