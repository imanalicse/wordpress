<?php

//set ajax url at header
function add_ajax_url(){
    ?>
    <script type="text/javascript">
        ajax_url = '<?php echo admin_url( 'admin-ajax.php'); ?>';
    </script>
<?php
}
add_action( 'wp_head', 'add_ajax_url', 1);

//sample ajax calling
add_action('wp_ajax_get_items', 'get_items');
add_action('wp_ajax_nopriv_get_items', 'get_items');

function get_items(){
    echo 'Ajax';
    exit();
}

// calll ajax from js file like bellow
?>
<script>
	var cat_id = 5;
	var data = {
		action:'get_items',
		cat_id:cat_id
	}
	$.ajax({
		type:"POST",
		url: ajax_url,
		data: data,
		success: function(response){
		}
	});
</script>
 
 <?php
 
 //wp_ajax_nopriv_{$_POST[action]}