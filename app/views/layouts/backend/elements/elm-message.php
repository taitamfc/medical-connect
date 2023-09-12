<?php
$success = isset($_GET['success']) ? $_GET['success'] : '';
?>

<?php if($success):?>
<div id="message" class="notice notice-success">
	<p><strong><?= mc_lang('Item saved.')?></strong></p>
</div>
<?php endif;?>