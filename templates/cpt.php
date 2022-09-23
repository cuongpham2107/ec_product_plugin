<div class="wrap">
	<h1><?php echo __('CPT Manage', 'ec-product-plugin')?></a></h1>
	<?php settings_errors(); ?>

	<form method="post" action="options.php">
		<?php 
			settings_fields( 'ec_product_plugin_cpt_settings' );
			do_settings_sections( 'ec_product_cpt' );
			submit_button();
		?>
	</form>
	<ul>
		<li>
			<a href=""></a>
		</li>
	</ul>
</div>