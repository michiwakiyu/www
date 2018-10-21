<?php global $post; ?>
<div class="dcd-wrap <?php echo $color_class; ?>">
<?php if ( $image_url ) : ?>
	<div class="dcd-title-area">
		<div class="left">
			<h2 class="dcd-title"><?php echo esc_html( $title ); ?></h2>
			<p class="dcd-theme"><?php echo esc_html( $theme ); ?></p>
		</div>
		<div class="right">
			<img src="<?php echo $image_url; ?>" alt="<?php echo esc_html( $title ); ?>">
		</div>
	</div>
<?php else : ?>
	<h2 class="dcd-title"><?php echo esc_html( $title ); ?></h2>
<?php endif; ?>
	<div class="dcd-main">
		<?php
		// 2018/08/25 一旦、機能OFF 
		if (false) {
		?>
			<p class="dcd-description"><?php echo $description; ?></p>
		<?php } ?>
		<div class="dcd-btn-description">
			<span class="one">全くそう思わない</span>
			<span class="two">あまり思わない</span>
			<span class="three">どちらでもない</span>
			<span class="four">ややそう思う</span>
			<span class="five">とてもそう思う</span>
		</div>

		<form id="dcd-form" name="dcd-form">
			<input type="hidden" name="<?php echo esc_attr( DCD_Config::NAME ); ?>_nonce" value="<?php echo wp_create_nonce( DCD_Config::NAME ); ?>" />
			<input type="hidden" name="did" value="<?php echo esc_attr( $did ); ?>" />
			<input type="hidden" name="serial" value="<?php echo esc_attr( $serial ); ?>" />
			<input type="hidden" name="post_id" value="<?php echo esc_attr( $post->ID ); ?>" />
