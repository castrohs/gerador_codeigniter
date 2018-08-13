<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.maskMoney.js" ></script>

<script type="text/javascript">
    $(document).ready(function () {
//        console.log("formatado");
        
        $("input.formato_monetario").maskMoney({showSymbol: true, symbol: "R$", decimal: ",", thousands: "."});
    });
</script>
<!--
<input type="text" class="form-control formato_monetario" name="valor" placeholder="R$ 000,00">
-->