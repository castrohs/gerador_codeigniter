<script language="javascript">
    jQuery(".formato_data").mask("99/99/9999");
//    function formato_data(src, mask, e)
//    {
//        var tecla = ""
//        if (document.all) // Internet Explorer
//            tecla = event.keyCode;
//        else
//            tecla = e.which;
//        //code = evente.keyCode;
//        if (tecla != 8) {
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
<input type="text" class="form-control formato_data"
                                       placeholder="00/00/0000" autocomplete='off' 
                                       onkeyup="formato_data(this, '##/##/####', event)"
                                       maxlength="10" value=""> -->
