<?php
$insert_result = $this->session->flashdata('insert_result');
if (isset($insert_result)) {
    ?>
    <script type="text/javascript">
     window.alert('<?php echo $insert_result?>')
    window.location.href='<?php echo base_url('Usuario')?>';
	  
    </script>	
    <?php
 
}
