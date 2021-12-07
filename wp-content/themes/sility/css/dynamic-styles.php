<?php  header("Content-type: text/css; charset: UTF-8"); 
$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );

/*-----------------------------------------------------------------------------------*/
# Get Font Name
/*-----------------------------------------------------------------------------------*/
function weblusive_get_font ( $got_font ) {
	if ($got_font) {
		$font_pieces = explode(":", $got_font);
		$font_name = $font_pieces[0];
		return $font_name;
	}
}
?>
<?php if(weblusive_get_option('sticky_menu')):?>
@media (min-width: 1050px) {

.fixed-top.fixed{position:fixed !important;; top:0; z-index:9999 !important; width:100%;}
}
<?php endif?>
<?php $maincolor = weblusive_get_option('global_color'); if($maincolor):?>
.pagination-list li a:hover, .pagination-list li.current a,#wp-calendar caption,a.comment-reply-link,#contact-form input[type="submit"], .services a:hover, 
.title-dedicated, .cbp-ig-grid .cbp-ig-title:before, .quote blockquote, ul.social li a, .tab-list li a:hover,
.cbp-ig-grid li > a:hover, .team-member:hover, .progress-bar, .pt-header .pt-popular,
.blog-post,  #search-bar button, .btn-primary, .btn, .si-year::after, .post-header::before, #wp-calendar td a{
	background-color:<?php echo weblusive_get_option('global_color')?> ;
}
#submit_contact.btn-success, #uc-content .progress-bar-success{background-color:<?php echo weblusive_get_option('global_color')?> !important;}

.navbar-nav > li i, .inner-project span, .accent-color, .service-icon,
.section-inverse .count-header, .section-inverse .accent-color, .section-inverse .service-icon, .section-inverse blockquote small, 
.read-more-btn a, .section-inverse .tweet_text::before, .icon-box i, .section-inverse .devices-nav .flex-active a,
.devices-nav .flex-active a i, .devices-nav .flex-active a:hover i, .devices-nav .flex-active a, .fullwidth-box.inverse blockquote small,
.fullwidth-box.inverse .count-header, .fullwidth-box.inverse .read-more-btn .btn-link, .fullwidth-box.inverse .tweet_text::before, 
.fullwidth-box.inverse .icon-box i, .fullwidth-box.inverse .devices-nav .flex-active a
{
	color:<?php echo weblusive_get_option('global_color')?> !important;
}

.nav-arrows span,  .services a:hover, .bxslider img, .pricing-active .pricing-table,
.devices-nav .flex-active a i, .devices-nav .flex-active a:hover i{
	border-color:<?php echo weblusive_get_option('global_color')?> !important;
}
.team-member h3:after{
	border-top-color:<?php echo weblusive_get_option('global_color')?>;
}
.module_arrow, .arrow-right, .top-bar-section .dropdown li:hover {
	border-left-color:<?php echo weblusive_get_option('global_color')?>;
}
.footer-widget h3 span, .sl-slider h2 span, .recent-projects > h2 span, h2.heading span, .team > h2 span, .contact-page > h2 span, .blog > h2 span, 
h2.top-title span, .single-work > h2 span, .filter-items a.active, .filter-items li a:hover{
	border-bottom-color:<?php echo weblusive_get_option('global_color')?>;
}
<?php endif?>
<?php $bg = weblusive_get_option( 'background' ); 
if( weblusive_get_option('background_full') ): ?>
body, .section{<?php echo "\n"; ?>
	<?php if (isset( $bg['color'])):?> background-color:<?php echo $bg['color']?> !important;<?php endif?>
	<?php if (isset( $bg['img'])):?>
		background : url('<?php echo $bg['img'] ?>') <?php echo "\n"; ?> no-repeat center center fixed;
		filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $bg['img'] ?>',sizingMethod='scale') !important;<?php echo "\n"; ?>
		-ms-filter: "progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $bg['img'] ?>',sizingMethod='scale')" !important;<?php echo "\n"; ?>
		-webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
		background-size: cover;
	<?php endif?>
}
<?php else: ?>
	body, .section{background:<?php echo isset($bg['color']) ? $bg['color'] : '';?> <?php echo isset($bg['img']) ? 'url('.$bg['img'].')' : '' ?> <?php echo isset($bg['repeat']) ? $bg['repeat'] : ''; ?> <?php echo isset($bg['attachment']) ? $bg['attachment'] : ''; ?> <?php echo  isset($bg['hor']) ? $bg['hor'] : ''  ?> <?php echo  isset($bg['ver']) ? $bg['ver'] :'' ?>}<?php echo "\n"; ?>
<?php endif; ?>
<?php if( weblusive_get_option( 'links_color' ) || weblusive_get_option( 'links_decoration' )  ): ?>
a {
	<?php if( weblusive_get_option( 'links_color' ) ) echo 'color: '.weblusive_get_option( 'links_color' ).' !important;'; ?>
	<?php if( weblusive_get_option( 'links_decoration' ) ) echo 'text-decoration: '.weblusive_get_option( 'links_decoration' ).' !important;'; ?>
}
<?php endif; ?>
<?php if( weblusive_get_option( 'links_color_hover' ) || weblusive_get_option( 'links_decoration_hover' )  ): ?>
a:hover {
	<?php if( weblusive_get_option( 'links_color_hover' ) ) echo 'color: '.weblusive_get_option( 'links_color_hover' ).' !important;'; ?>
	<?php if( weblusive_get_option( 'links_decoration_hover' ) ) echo 'text-decoration: '.weblusive_get_option( 'links_decoration_hover' ).' !important;'; ?>
}
<?php endif; ?>
<?php if( weblusive_get_option('header_background')):$bg = weblusive_get_option( 'header_background' );?>
	#navbar{background:<?php echo isset($bg['color']) ? $bg['color'] : '';?> url('<?php echo isset($bg['img']) ? $bg['img'] : '' ?>') <?php echo isset($bg['repeat']) ? $bg['repeat'] : ''; ?> <?php echo isset($bg['attachment']) ? $bg['attachment'] : ''; ?> <?php echo  isset($bg['hor']) ? $bg['hor'] : ''  ?> <?php echo  isset($bg['ver']) ? $bg['ver'] :'' ?> !important;}
<?php endif; ?>

<?php if( weblusive_get_option( 'sub_nav_background' )): ?>
.dropdown-menu{background-color:<?php echo weblusive_get_option( 'sub_nav_background' ).' !important;';?>;}<?php echo "\n"; ?>
<?php endif; ?>
<?php if( weblusive_get_option( 'sub_nav_color' )): ?>
.dropdown-menu li a {color:<?php echo weblusive_get_option( 'sub_nav_color' ).' !important;';?>;}<?php echo "\n"; ?>
<?php endif; ?>
<?php if( weblusive_get_option( 'nav_links_color' ) ): ?>
.navbar-nav > li.drop > a, .navbar-nav > li > a{
	<?php if( weblusive_get_option( 'nav_links_color' ) ) echo 'color: '.weblusive_get_option( 'nav_links_color' ).' !important;'; ?>
}
<?php endif; ?>
<?php if( weblusive_get_option( 'nav_current_links_color' ) || weblusive_get_option( 'nav_current_bg' )): ?>
.navbar-nav > li > a.active, .navbar-nav li.current_page_item a, .navbar-nav li.current-menu-item > a, 
.navbar-nav li.current-menu-parent > a, .navbar-nav > .active > a, 
.navbar-nav > .active > a:hover, .navbar-nav > .active > a:focus {
	<?php if( weblusive_get_option( 'nav_current_links_color' ) ) echo 'color: '.weblusive_get_option( 'nav_current_links_color' ).' !important;'; ?>
	<?php if( weblusive_get_option( 'nav_current_bg' ) ) echo 'background-color:'.weblusive_get_option( 'nav_current_bg' ).' !important;'; ?>
}
<?php endif; ?>
<?php if( weblusive_get_option( 'nav_hover_links_color' )): ?>
	.main-nav ul li a:hover, .navbar-default .navbar-nav>li>a:hover { color: <?php echo weblusive_get_option( 'nav_hover_links_color' )?> !important}
<?php endif; ?>
<?php if( weblusive_get_option( 'nav_separator' ) ): ?>
.dropdown li {
	border-top-color: <?php echo weblusive_get_option( 'nav_separator' ); ?>;
}
<?php endif; ?>
<?php $contentbg = weblusive_get_option( 'main_content_bg' ); 
if( !empty( $contentbg['img']) || !empty( $contentbg['color'] ) ): ?>
.page-content{background:<?php echo isset($contentbg['color']) ? $contentbg['color'] : '';?> url('<?php echo isset($contentbg['img']) ? $contentbg['img'] : '' ?>') <?php echo isset($contentbg['repeat']) ? $contentbg['repeat'] : ''; ?> <?php echo isset($contentbg['attachment']) ? $contentbg['attachment'] : ''; ?> <?php echo  isset($contentbg['hor']) ? $contentbg['hor'] : ''  ?> <?php echo  isset($contentbg['ver']) ? $contentbg['ver'] :'' ?>;}<?php echo "\n"; ?>
<?php endif; ?>
<?php if( weblusive_get_option('promo_bg')):$bg = weblusive_get_option( 'promo_bg' );?>
	#page-header{background:<?php echo isset($bg['color']) ? $bg['color'] : '';?> url('<?php echo isset($bg['img']) ? $bg['img'] : '' ?>') <?php echo isset($bg['repeat']) ? $bg['repeat'] : ''; ?> <?php echo isset($bg['attachment']) ? $bg['attachment'] : ''; ?> <?php echo  isset($bg['hor']) ? $bg['hor'] : ''  ?> <?php echo  isset($bg['ver']) ? $bg['ver'] :'' ?> !important;}
<?php endif; ?>
<?php if( weblusive_get_option('footer_background')):$footerbg = weblusive_get_option( 'footer_background' );?>
	footer{background:<?php echo isset($footerbg['color']) ? $footerbg['color'] : '';?> url('<?php echo isset($footerbg['img']) ? $footerbg['img'] : '' ?>') <?php echo isset($footerbg['repeat']) ? $footerbg['repeat'] : ''; ?> <?php echo isset($footerbg['attachment']) ? $footerbg['attachment'] : ''; ?> <?php echo  isset($footerbg['hor']) ? $footerbg['hor'] : ''  ?> <?php echo  isset($footerbg['ver']) ? $footerbg['ver'] :'' ?> !important;}
<?php endif; ?>
<?php if( weblusive_get_option( 'footer_title_color' ) ): ?>
.footer-widget h3{	<?php if( weblusive_get_option( 'footer_title_color' ) ) echo 'color: '.weblusive_get_option( 'footer_title_color' ).';'; ?>
}
<?php endif; ?>
<?php if( weblusive_get_option( 'footer_links_color' ) ): ?>
footer a  {	<?php if( weblusive_get_option( 'footer_links_color' ) ) echo 'color: '.weblusive_get_option( 'footer_links_color' ).' !important;'; ?>
}
<?php endif; ?>
<?php if( weblusive_get_option( 'footer_links_color_hover' ) ): ?>
footer a:hover {<?php if( weblusive_get_option( 'footer_links_color_hover' ) ) echo 'color: '.weblusive_get_option( 'footer_links_color_hover' ).' !important;'; ?>
}
<?php endif; ?>
<?php  $css =  weblusive_get_option('css'); if (isset($css)) echo htmlspecialchars_decode($css ) , "\n";?>
<?php if( weblusive_get_option('css_tablets') ) : ?>
@media (min-width: 768px) and (max-width: 979px) { 
<?php echo htmlspecialchars_decode( weblusive_get_option('css_tablets') ) , "\n";?>
}
<?php endif; ?>
<?php if( weblusive_get_option('css_wide_phones') ) : ?>
@media (max-width: 767px) {
<?php echo htmlspecialchars_decode( weblusive_get_option('css_wide_phones') ) , "\n";?>
}
<?php endif; ?>
<?php if( weblusive_get_option('css_phones') ) : ?>
@media (max-width: 480px) {
<?php echo htmlspecialchars_decode( weblusive_get_option('css_phones') ) , "\n";?>
}
<?php endif; ?>
<?php foreach( $custom_typography as $selector => $value):
$option = weblusive_get_option( $value );
if(isset( $option['font']) || isset($option['color']) || isset($option['size']) || isset($option['weight']) || isset($option['style']) ):
echo "\n".$selector."{\n"; ?>
<?php if(isset($option['font']))
	echo "	font-family: '". weblusive_get_font( $option['font']  )."' !important;\n"?>
<?php if(isset($option['color']))
	echo "	color :". $option['color']."  !important;\n"?>
<?php if(isset($option['size'] ))
	echo "	font-size : ".$option['size']."px !important;\n"?>
<?php if(isset($option['weight']) )
	echo "	font-weight: ".$option['weight']." !important;\n"?>
<?php if(isset($option['style'] ))
	echo "	font-style: ". $option['style']."  !important;\n";
	echo "}\n";?>
<?php endif;
endforeach; ?>

<?php
$args = array(
	'sort_order' => 'ASC',
	'sort_column' => 'menu_order',
	'hierarchical' => 1,
	'post_type' => 'page',
	'post_status' => 'publish'
);

$pages = get_pages($args);
foreach ( $pages as $pag ) :
	$page = get_page($pag);
	$get_meta = get_post_custom($page->ID);
	
	$bgrepeat = isset ($get_meta['_weblusive_page_bgrepeat']) ? $get_meta['_weblusive_page_bgrepeat'][0] : '';
	$bgcolor = isset ($get_meta['_weblusive_page_bgcolor']) ? $get_meta['_weblusive_page_bgcolor'][0] : '';
	$bgimage = isset ($get_meta['_weblusive_page_bg']) ? $get_meta['_weblusive_page_bg'][0] : '';	
	$color = isset ($get_meta['_weblusive_page_color']) ? $get_meta['_weblusive_page_color'][0] : '';
	
	echo '.pagecustom-'.$page->ID.'{';
		echo $bgrepeat === '' ? '' : 'background-repeat:'.$bgrepeat.' !important;';
		echo $bgcolor === '' ? '' : 'background-color:'.$bgcolor.' !important;';
		echo $bgimage === '' ? '' : 'background-image:url('.$bgimage.') !important;';
		echo 'background-position:center top';
	echo '}';
	
	if ($color!== ''):?>
		.pagecustom-<?php echo $page->ID?> * {color:<?php echo $color ?>}
	<?php endif; ?>	
<?php endforeach ?>	