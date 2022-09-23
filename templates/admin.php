<div class="wrap">
	<h1><?php echo esc_html_e('Ec_product Plugin', 'ec-product-plugin')?></h1>
	<?php settings_errors(); ?>

	<ul class="nav nav-tabs">
		<li class="active"><a href="#tab-1"><?php echo __('Manage Settings', 'ec-product-plugin')?></a></li>
		<!-- <li><a href="#tab-2"><?php echo __('Update', 'ec-product-plugin')?></a></a></li>
		<li><a href="#tab-3"><?php echo __('About', 'ec-product-plugin')?></a></a></li> -->
	</ul>

	<div class="tab-content">
		<div id="tab-1" class="tab-pane active">

			<form method="post" action="options.php">
				<?php 
					settings_fields( 'ec_product_plugin_settings' );
					do_settings_sections( 'ec_product_plugin' );
					submit_button();
				?>
			</form>
			
		</div>

		<!-- <div id="tab-2" class="tab-pane">
			<h3>Updates</h3>
		</div>

		<div id="tab-3" class="tab-pane">
			<h3>About</h3>
		</div> -->
	</div>
</div>