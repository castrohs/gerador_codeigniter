<form action="<?php echo base_url() ?>GrupoAcesso/atualizar" method="post" name="adicionar" id="adicionar" class="form-horizontal">


    <fieldset>

        <!-- Form Name -->
        <legend>Grupo de Acesso</legend>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="nome">Nome</label>  
            <div class="col-md-4">
                <input id="nome" name="nome" placeholder="Nome" class="form-control input-md" required="" type="text" value="<?php echo $grupoacesso->nome?>">

            </div>
        </div>


    </fieldset>

    <!-- Button -->
    <div class="form-group">
        <label class="col-md-4 control-label" for="submit"></label>
        <div class="col-md-4">
            <input id="id_nivel_acesso" name="id_nivel_acesso"  placeholder="Nome" class="form-control input-md" required="" type="hidden" value="<?php echo $grupoacesso->id_nivel_acesso?>">
            <button id="submit" name="submit" class="btn btn-success">Atualizar</button>
        </div>
    </div>

</form>


<?php $this->load->view("scripts/formato_data"); ?>
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

