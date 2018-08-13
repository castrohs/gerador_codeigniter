<script language="javascript">
    jQuery(".cpf").mask("999.999.999-99");
//    function formato_cpf(src, mask, e)
//    {
//        var tecla = "";
//        if (document.all) // Internet Explorer
//            tecla = event.keyCode;
//        else
//            tecla = e.which;
//        //code = evente.keyCode;
//        if (tecla != 14) {
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
<input type="text" class="form-control cpf"
                                       placeholder="999.999.999-99" autocomplete='off' 
                                       onkeyup="formato_cpf(this, '###.###.###-##', event)"
                                       maxlength="13" value=""> 
-->
