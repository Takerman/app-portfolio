<?php 
/**
 * Options of the slider item.
 *
 * @package themeplaza_slider
 * @subpackage options
 * @version 1.0.0
 * @since 1.0.0
 * @author Grig <grigpage@gmail.com>
 * @copyright Copyright (c) 2015, Themeplaza
 */
?>

<ul id="weblusive-slider-items">
	<?php
	if( $slider ){
	$i=0;
	foreach( $slider as $slide ):
		$i++; ?>
		<li id="listItem_<?php echo $i ?>"  class="ui-state-default zebra-table postbox <?php if($i != count($slider)) echo 'closed';?>">
			<div class="handlediv" title="Click to toggle"><br></div>
			<h3 class="hint-title">Slide <?php echo $i; ?> Parameters</h3>
			<div class="widget-content option-item inside">
				
				<div class="slider-img">
					<?php if(array_key_exists('image', $slide) ) : ?>
						<?php echo wp_get_attachment_image( $slide['id'] , 'thumbnail' );  ?>
						<input type="hidden" name="custom_slider[<?php echo $i ?>][image]" id="custom_slider[<?php echo $i ?>][image]" value="<?php if(array_key_exists('image', $slide)) echo esc_url($slide['image']); ?>">
					<?php else : 
						echo wp_get_attachment_image( $slide['id'] , 'full' ); 
						$image_attributes = wp_get_attachment_image_src( $slide['id'] , 'full' );
						$image_src = $image_attributes[0];
					?>
						<input type="hidden" name="custom_slider[<?php echo $i ?>][image]" id="custom_slider[<?php echo $i ?>][image]" value="<?php if($image_src) echo esc_url($image_src); ?>">
					<?php endif ?>
				</div>				
				<label for="custom_slider[<?php echo $i ?>][content]">
					<span style="float:left" >Slide Content (Optional)&nbsp;:</span>
					<textarea name="custom_slider[<?php echo $i ?>][content]" id="custom_slider[<?php echo $i ?>][content]"><?php echo isset($slide['content']) ? stripslashes($slide['content']) : ''; ?></textarea>
				</label>
				<br>
				<label for="custom_slider[<?php echo $i ?>][link]">
					<span style="float:left" >Slide URL (Optional) :</span>
					<input type="text" name="custom_slider[<?php echo $i ?>][link]" id="custom_slider[<?php echo $i ?>][link]" value="<?php echo isset($slide['link']) ? stripslashes($slide['link']) : ''; ?>" />
				</label>

				<input id="custom_slider[<?php echo $i ?>][id]" name="custom_slider[<?php echo $i ?>][id]" value="<?php  echo $slide['id']  ?>" type="hidden" />
				<a class="del-cat"></a>

			</div>
		</li>
	<?php endforeach; 
	}else{
		echo ' <p> Use the button above to add slides.</p>';
	}?>
</ul>

<?php 
	// Sava data
	array_push( ThemeplazaSliderAdmin::$fields, "custom_slider");
 ?>