<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$id = uniqid( 'info-list-' );
?>
<div id="<?php echo esc_attr($id); ?>" class="info-list">
	<?php if (!empty($atts['title'])): ?>
		<div class="block-title info-list-title">
	      <h3><?php echo esc_html($atts['title']); ?></h3>
	    </div>
	<?php endif; ?>

	<ul class="fw-info-list info-list">
	  	<?php foreach ($atts['infolist'] as $info_list): ?>
			<li><span class="title"><?php echo esc_html($info_list['title']); ?></span>
				<span class="value">
					<?php if (!empty($info_list['link'])): ?>
						<a href="<?php echo esc_url($info_list['link']); ?>" target="<?php echo esc_attr($info_list['target']); ?>">
							<?php echo esc_html($info_list['text']); ?>
						</a>
					<?php else: ?>
						<?php echo esc_html($info_list['text']); ?>
					<?php endif; ?>
				</span>
			</li>
		<?php endforeach; ?>
	</ul>
</div>
