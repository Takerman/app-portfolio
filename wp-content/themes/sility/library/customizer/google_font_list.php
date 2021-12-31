<?php
if (class_exists('WP_Customize_Control')){
class Google_Fonts_List_Control extends WP_Customize_Control {
		 public function render_content() {
			  require ('google-fonts.php');
$google_font_array = json_decode ($google_api_output,true) ;
	
$items = $google_font_array['items'];
	
$options_fonts=array();
$options_fonts[''] = "Default Font" ;
$fontID = 0;
foreach ($items as $item) {
	$fontID++;
	$variants='';
	$variantCount=0;
	foreach ($item['variants'] as $variant) {
		$variantCount++;
		if ($variantCount>1) { $variants .= '|'; }
		$variants .= $variant;
	}
	$variantText = ' (' . $variantCount . ' Varaints' . ')';
	if ($variantCount <= 1) $variantText = '';
	$options_fonts[ $item['family'] . ':' . $variants ] = $item['family']. $variantText;
}
                ?>
                    <label>
                      <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
					  <select <?php $this->link(); ?>>
                        <?php
                            foreach ( $options_fonts as $font => $font_name  )
                            {
								printf('<option value="%s" %s>%s</option>', $font, selected($this->value(), $font, false), $font_name);

                            }
                        ?>
                    </select>
                    </label>
                <?php
		   }

     }
}
?>