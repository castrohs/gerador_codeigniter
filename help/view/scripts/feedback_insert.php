<?php
$insert_result = $this->session->flashdata('insert_result');
if (isset($insert_result)) {
    ?>
    <script type="text/javascript">
        alert('<?php echo $insert_result; ?>');

    </script>	
    <?php
}
?>
