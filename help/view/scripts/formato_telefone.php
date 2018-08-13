<script language="javascript">
    jQuery(".formato_telefone").mask("(99)9999-9999");
//    function formato_cnpj(src, mask, e)
//    {
//        var tecla = "";
//        if (document.all) // Internet Explorer
//            tecla = event.keyCode;
//        else
//            tecla = e.which;
//        //code = evente.keyCode;
//        if (tecla != 18) {
//            if (src.value.length == src.maxlength) {
//                return;
//            }
//            var i = src.value.length;
//            var saida = mask.substring(0, 1);
//            var texto = mask.substring(i);
//            if (texto.substring(0, 1) != saida)
//            {
//                src.value += texto.substring(0, 1);
//            }
//        }
//    }
</script>
<!--
como usar
<input type="text" class="form-control cnpj"
                                       placeholder="99.999.999/9999-99" autocomplete='off' 
                                       onkeyup="formato_cnpj(this, '##.###.###/####-##', event)"
                                       maxlength="18" value=""> 
-->
