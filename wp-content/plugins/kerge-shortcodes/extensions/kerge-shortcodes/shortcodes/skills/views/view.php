<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$id = uniqid( 'skills-' );
$style = !empty($atts['skills_style']) ? "{$atts['skills_style']}" : 'skills-second-style';
?>

<?php if (!empty($atts['title'])): ?>
	<div class="block-title fw-skills-title">
		<h3><?php echo esc_html($atts['title']); ?></h3>
	</div>
<?php endif; ?>

<div id="<?php echo esc_attr($id); ?>" class="skills-info <?php echo esc_attr($style); ?>">
	<?php foreach ($atts['skills'] as $skill): ?>
		<?php if ($style == 'skills-first-style') { ?>
			<h4><?php echo esc_html($skill['title']); ?></h4>                               
			<div id="skill-<?php echo esc_attr($skill['id']); ?>" data-value="<?php echo esc_attr($skill['value']); ?>" data-color="<?php echo esc_attr($skill['color']); ?>" class="skill-container">
				<div class="skill-percentage"></div>
			</div>
		<?php } else { ?>
			<div class="clearfix">
				<h4><?php echo esc_html($skill['title']); ?></h4>
				<div class="skill-value"><?php echo esc_html($skill['value']); ?>%</div>
			</div>
			<div id="skill-<?php echo esc_attr($skill['id']); ?>" data-value="<?php echo esc_attr($skill['value']); ?>" data-color="<?php echo esc_attr($skill['color']); ?>" class="skill-container">
				<div class="skill-percentage"></div>
			</div>
		<?php } ?>
	<?php endforeach; ?>
</div>
