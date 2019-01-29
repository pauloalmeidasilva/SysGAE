	<!-- INÍCIO DA DASHBOARD -->
	<div class="container-fluid">
		<div class="row">

			<!-- INÍCIO DO MENU -->
			<nav class="col-md-2 d-none d-md-block bg-light sidebar">
				<div class="sidebar-sticky">
					<h6><strong>Cadastro de Cargos</strong></h6>
					<ul class="nav flex-column">
						<li class="nav-item"><!-- <a class="nav-link" data-target="#modalteste">Novo Cargo</a> -->
							<button class="btn btn-link nav-link" data-target="#novo-modal" data-toggle="modal">Novo Cargo</button>
						</li>
						<li class="nav-item"><a class="btn btn-link nav-link text-left" href="<?php echo DIRPAGE.'cargo'; ?>" style="">Exibir Cargos</a></li>
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
						if (isset($_SESSION['paginacao'])) {
							echo $_SESSION['paginacao'];
						}
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

	<!-- INICIO DA MODAL "NOVO" -->
	<div class="modal fade" id="novo-modal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header bg-primary">
					<h5 class="modal-title text-white" id="exampleModalLabel">Cadastrar Cargo</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="<?php echo DIRPAGE.'cargo/cadastrar'; ?>" method="post">
			    		<div class="form-group">
			    			<label for="nome-cargo">Nome do Cargo</label>
			    			<input type="text" class="form-control" name="nome-cargo" placeholder="Nome">
			    		</div>
			    		<div class="form-group">
			    			<label for="des-cargo">Descrição</label>
			    			<textarea class="form-control" rows="5" name="des-cargo" placeholder="Descrição do Cargo"></textarea>
			    		</div>
			    		<div class="modal-footer">
			    			<button type="submit" class="btn btn-primary">Cadastrar</button>
			    		</div>
			    	</form>
				</div>
			</div>
		</div>
	</div>
	<!-- FIM DA MODAL "NOVO" -->

	<!-- INÍCIO DA MODAL "VISUALIZAR" -->
	<div class="modal fade" id="visualizar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header bg-info" style="color: black;">
					<h5 class="modal-title text-white" id="cst-nome-cargo"></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body" style="color: black;">
					<dl class="row">
						<dt class="col-sm-3">Descrição</dt>
						<dd class="col-sm-9" id="cst-des-cargo"></dd>
					</dl>
					<!-- <div class="container">
			    		<p>Descrição</p>
			    		<p id="cst-des-cargo"></p>
			    	</div> -->		
				</div>
			</div>
		</div>
	</div>
	<!-- FIM DA MODAL "VISUALIZAR" -->

	<!-- INICIO DA MODAL "ALTERAR"-->
	<div class="modal fade" id="alterar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header bg-warning">
					<h5 class="modal-title" id="exampleModalLabel">Alterar</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="<?php echo DIRPAGE.'cargo/alterar'; ?>" method="post">
						<input type="hidden" class="form-control" id="alt-id-cargo" name="codigo-cargo">
			    		<div class="form-group">
			    			<label for="nome-cargo">Nome do Cargo</label>
			    			<input type="text" class="form-control" id="alt-nome-cargo" name="nome-cargo" placeholder="Nome">
			    		</div>
			    		<div class="form-group">
			    			<label for="desc-cargo">Descrição</label>
			    			<textarea class="form-control" rows="5" id="alt-des-cargo" name="desc-cargo" placeholder="Descrição do Cargo"></textarea>
			    		</div>
			    		<div class="modal-footer">
			    			<button type="submit" class="btn btn-primary">Alterar</button>
			    		</div>
			    	</form>
				</div>
			</div>
		</div>
	</div>
	<!-- FIM DA MODAL "ALTERAR"-->

	<!-- INICIO DA MODAL "EXCLUIR" -->
	<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header bg-danger text-white" style="color: black;">
					<h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-trash-alt"></i> - Tem Certeza que deseja excluir este cargo?</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body" style="color: black;">
					<form action="<?php echo DIRPAGE.'cargo/deletar'; ?>" method="post">
						<input type="hidden" class="form-control" id="del-id-cargo" name="codigo-cargo">
						<h5 id="del-nome-cargo"></h5>
						<div class="modal-footer">
							<button type="submit" class="btn btn-danger">Excluir</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- FIM DA MODAL "EXCLUIR" -->

	