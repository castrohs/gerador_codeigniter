
<?php
if (isset($insert_result)) {

    if ($insert_result) {
        $msg = "salvo com sucesso.";
    } else {
        $msg = "não salva.";
    }
    ?>
    <script type="text/javascript">
        alert('GrupoAcesso <?php echo $msg; ?>');

    </script>	
    <?php
}
?>
<div class="container-fluid">
	
    <br>
	<div class="row">
		<div class="col-md-12">
                    <a href="#" data-toggle="modal" data-target="#adicionar" class="btn btn-sm btn-success pull-right"
                   ><span class="glyphicon glyphicon-plus"></span></a>
                <br>    
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>
							#
						</th>
						<th>
							Nome
						</th>
						
                                                <th></th>
                                                <th></th>
						
					</tr>
				</thead>
				<tbody>
				<?php
foreach ($grupoacessos as $key => $grupo) {
//                                                var_dump($grupo);
    ?>
                    <tr>
                    <td><?php echo $grupo->id_nivel_acesso; ?> </td>

                    <td ><?php echo $grupo->nome; ?></td>
                    
                    <td><a href="<?php echo base_url();?>GrupoAcesso/atualizarGrupoAcesso/<?php echo $grupo->id_nivel_acesso; ?>" class="btn btn-info "><span class="glyphicon glyphicon-pencil"></span>  </a></td>
                    <td>
                            <a href="#" data-toggle="modal" data-target="#remover<?php echo $grupo->id_nivel_acesso; ?>" class="btn btn-danger">
                                       
                                        <span class="glyphicon glyphicon-remove"></span>
                                    </a>
                                </td>
                    </tr>
    <?php
}
?>	
				</tbody>
			</table>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
		</div>
	</div>

</div>
    <!--modal adicionar --> 
<div id="adicionar" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?php echo base_url() ?>GrupoAcesso/cadastrar" method="post" name="adicionar" id="adicionar" class="form-horizontal">

                
<fieldset>

<!-- Form Name -->
<legend>GrupoAcesso</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nome">Nome</label>  
  <div class="col-md-4">
  <input id="nome" name="nome" placeholder="Nome" class="form-control input-md" required="" type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="telefone">Telefone</label>  
  <div class="col-md-4">
  <input id="telefone" name="telefone" placeholder="513333333" class="form-control input-md" type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="email">Email</label>  
  <div class="col-md-4">
  <input id="email" name="email" placeholder="" class="form-control input-md" type="text">
    
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="endereco">Enderço</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="endereco" name="endereco"></textarea>
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="descricao">Descrição</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="descricao" name="descricao"></textarea>
  </div>
</div>

</fieldset>

<!-- Button -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="submit"></label>
                        <div class="col-md-4">
                            <button id="submit" name="submit" class="btn btn-success">Cadastrar</button>
                        </div>
                    </div>

            </form>

        </div>
    </div>
</div>

<?php $this->load->view("scripts/formato_data"); ?>
<?php $this->load->view("scripts/multifilter"); ?>
<?php $this->load->view("scripts/formato_monetario"); ?>
<?php $this->load->view("scripts/formato_cpf"); ?>
<?php $this->load->view("scripts/loader"); ?>
<script>



    $(document).ready(function () {
        $('.id_funeraria').show();
        $("#valor_total").val("");
        $('.loader').hide();
        if ($("#tipo_cliente").val() === "1") {
            $('.id_funeraria').show();
            $('.pj_pagamento').show();
            $('.pf_pagamento').hide();
            $('.pf_documentos').hide();
        } else {
            $('.pf_documentos').show();
            $('.pf_pagamento').show();
            $('.id_funeraria').hide();
            $('.pj_pagamento').hide();
        }
    });

    $("#tipo_cliente").on('change', function () {
        $("#valor_total").val("");

        if ($("#tipo_cliente").val() === "1") {
            $('.id_funeraria').show();
            $('.pj_pagamento').show();
            $('.pf_pagamento').hide();
            $('.pf_documentos').hide();

        } else {
            $('.pf_documentos').show();
            $('.pf_pagamento').show();
            $('.id_funeraria').hide();
            $('.pj_pagamento').hide();
        }
    }).change();
//    
//    

    $('input[name=id_valores]:radio').change(function () {
        var id_val = $(this).val();

        $("#valor_total").val("Carregando");
        $('.loader').show();
        $.ajax({
            url: '<?php echo site_url('Valores/busca_valor_vw_cr'); ?>',
            data: {
                id_valores: id_val

            },
            type: 'post',
            success: function (data) {
//                console.log(data);
                $('.loader').hide();
                $("#valor_total").val(data);

            }
        });
    });
</script>







