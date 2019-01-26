	<!-- INÍCIO DA DASHBOARD -->
	<div class="container-fluid">
		<div class="row">

			<!-- INÍCIO DO MENU -->
			<nav class="col-md-2 d-none d-md-block bg-light sidebar">
				<div class="sidebar-sticky">
					<h6><strong>Cadastro de Cargos</strong></h6>
					<ul class="nav flex-column">
						<li class="nav-item"><!-- <a class="nav-link" data-target="#modalteste">Novo Cargo</a> <-->
							<button class="btn btn-link nav-link" data-target="#novo-modal" data-toggle="modal">Novo Cargo</button>
						</--></li>
						<li class="nav-item"><a class="nav-link" href="#">Exibir Cargos</a></li>
						<li><hr></li>
						<li><a class="btn btn-primary mx-auto d-block" href="<?php echo DIRPAGE.'dashboard'; ?>" style="width: 100px;">Voltar</a></li>
					</ul>
				</div>
			</nav>
			<!-- FIM DO MENU -->
			
			<!-- INÍCIO DO CONTEÚDO PRINCIPAL -->
			<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
				<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
					<h1 class="h2">Cargos</h1>
				</div>
				<div class="container">
					<?php
					echo $_SESSION['tabela'];
					?>
				</div>

				<?php
					if (isset($_SESSION['aviso'])) {
						echo $_SESSION['aviso'];
						$_SESSION['aviso'] = null;
					}
				?>
			</main>
			<!-- FIM DO CONTEÚDO PRINCIPAL -->
		</div>
	</div>
	<!-- FIM DA DASHBOARD -->

	<!-- Início da modal "Novo"-->
	<div class="modal fade" id="novo-modal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Cadastrar Cargo</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="<?php echo DIRPAGE.'cargo/cadastrar'; ?>" method="post">
						<input type="hidden" class="form-control" id="codigo-cargo" name="codigo-cargo" value="0">
			    		<div class="form-group">
			    			<label for="nome-cargo">Nome do Cargo</label>
			    			<input type="text" class="form-control" name="nome-cargo" placeholder="Nome">
			    		</div>
			    		<div class="form-group">
			    			<label for="end-cargo">Descrição</label>
			    			<textarea class="form-control" rows="3" name="end-cargo" placeholder="Descrição do Cargo"></textarea>
			    		</div>
			    		<div class="modal-footer">
			    			<button type="submit" class="btn btn-primary">Cadastrar</button>
			    		</div>
			    	</form>
				</div>
			</div>
		</div>
	</div>
	<!-- Fim da Modal "Novo" -->