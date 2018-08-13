<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<h3 class="text-center">
				Autenticação no Sistema Financeiro
			</h3>
                    <form role="form" method="post" action="<?php echo base_url();?>Usuario/login">
                            <div class="form-group">
					 
					<label for="nome">
						usuario
					</label>
					<input class="form-control" id="usuario" name="usuario" type="text" />
				</div>
                           
				<div class="form-group">
					 
					<label for="senha">
						Senha
					</label>
                                    <input class="form-control" id="senha" type="password" name="senha"/>
				</div>
				
				
				<button type="submit" class="btn btn-default">
					Autenticar
				</button>
			</form>
		</div>
	</div>
</div>