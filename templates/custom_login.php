<div class="wrap">
	<?php settings_errors(); ?>
	<?php wp_enqueue_media()?> 
	<div class="tab-content">
		<div id="tab-1" class="tab-pane active">
		<h1><?php echo __('Setting Login','ec-product-plugin') ?></h1>
			<form method="post" action="options.php">
				<?php 
					settings_fields( 'custom_login_settings' );
					do_settings_sections( 'custom_login_page' );
					?>
					<h2 class="font-bold mt-4">Giao diện</h2>
					<div class="flex space-x-4">
						<?php
						$image_one = get_option('custom_login_logo_one');//option value
						$bg_one = get_option('custom_login_bg_one');
						$image_two = get_option('custom_login_logo_two');//option value
						$bg_two = get_option('custom_login_bg_two');
						$image_three = get_option('custom_login_logo_three');//option value
						$bg_three = get_option('custom_login_bg_three');
						?>
						<div class="my-4 flex flex-col">
							<input class="!mx-auto !mb-2" name="active_theme_login" type="radio" value="one" <?php if(get_option('active_theme_login') == 'one') echo 'checked'  ?> >
							<input type="hidden" name="custom_login_logo_one" value="<?php echo $image_one ?>" id="value_logo_one">
							<div class="btnImage_one">
								<img class="w-40 h-40 p-2 " src="<?php echo $image_one ?>" id="getImage_one" style="border:1px solid" alt="">
							</div>
						
							<input class="mx-auto mt-2" type="color" name="custom_login_bg_one" value="<?php echo $bg_one ?>">
							
						</div>
						<div class="my-4 flex flex-col">
							<input class="!mx-auto !mb-2" name="active_theme_login" type="radio" value="two" <?php if(get_option('active_theme_login') == 'two') echo 'checked'  ?> >
							<input type="hidden" name="custom_login_logo_two" value="<?php echo $image_two ?>" id="value_logo_two">
							<div class="btnImage_two">
								<img class="w-40 h-40 p-2 " src="<?php echo $image_two ?>" id="getImage_two" style="border:1px solid" alt="">
							</div>
							<input class="mx-auto mt-2" type="color" name="custom_login_bg_two" value="<?php echo $bg_two ?>">
							
						</div>
						<div class="my-4 flex flex-col">
							<input class="!mx-auto !mb-2" name="active_theme_login" type="radio" value="three" <?php if(get_option('active_theme_login') == 'three') echo 'checked'  ?> >
							<input type="hidden" name="custom_login_logo_three" value="<?php echo $image_three ?>" id="value_logo_three">
							<div class="btnImage_three">
								<img class="w-40 h-40 p-2 " src="<?php echo $image_three ?>" id="getImage_three" style="border:1px solid" alt="">
							</div>
							<input class="mx-auto mt-2" type="color" name="custom_login_bg_three" value="<?php echo $bg_three ?>">
							
						</div>
					</div>
					<?php
					submit_button();
				?>
			</form>
			
		</div>
	</div>

</div>