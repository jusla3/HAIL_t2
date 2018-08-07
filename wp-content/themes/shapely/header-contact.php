<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link    https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Shapely
 */

?>
<?php

$shapely_transparent_header         = get_theme_mod( 'shapely_transparent_header', 0 );
$shapely_transparent_header_opacity = get_theme_mod( 'shapely_sticky_header_transparency', 100 );

if ( 1 == $shapely_transparent_header && $shapely_transparent_header_opacity ) {
	if ( $shapely_transparent_header_opacity < 100 ) {
		$style = 'style="background: rgba(255, 255, 255, 0.' . esc_attr( $shapely_transparent_header_opacity ) . ');"';
	} else {
		$style = 'style="background: rgba(255, 255, 255, ' . esc_attr( $shapely_transparent_header_opacity ) . ');"';
	}
} else {
	$style = '';
}
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
  <!---TESTING CUSTOME HEADER---->
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!-------------------Testing PoUp css-->
	<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,600,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="/wp-content/themes/shapely/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="/wp-content/themes/shapely/assets/css/style.css">
	<!-------------------Testing PoUp css-->
	<!-------------------Testing PoUp JS-->
	<script src="/wp-content/themes/shapely/assets/js/jquery.min.js"></script>
	<script src="/wp-content/themes/shapely/assets/js/script0.js"></script>
	<script src="https://code.jquery.com/jquery-2.2.3.min.js"></script>
	<!-------------------Testing PoUp JS-->

<?php wp_head(); ?>
	
</head>

<?php body_class(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'shapely' ); ?></a>

	<header id="masthead" class="site-header<?php echo get_theme_mod( 'mobile_menu_on_desktop', false ) ? ' mobile-menu' : ''; ?>" role="banner">
		<div class="nav-container">
			<nav <?php echo $style; ?> id="site-navigation" class="main-navigation" role="navigation">
				<div class="container nav-bar">
					<div class="flex-row">
						<div class="module left site-title-container">
							<?php shapely_get_header_logo(); ?>
						</div>
						<div class="module widget-handle mobile-toggle right visible-sm visible-xs">
							<i class="fa fa-bars"></i>
						</div>
						<div class="module-group right">
							<div class="module left">
								<?php shapely_header_menu(); ?>
							</div>
							<!--end of menu module-->
							<div class="module widget-handle search-widget-handle hidden-xs hidden-sm">
								<div class="search">
									<i class="fa fa-search"></i>
									<span class="title"><?php esc_html_e( 'Site Search', 'shapely' ); ?></span>
								</div>
								<div class="function">
									<?php
									get_search_form();
									?>
								</div>
							</div>
						</div>
						<!--end of module group-->
					</div>
				</div>
			</nav><!-- #site-navigation -->
		</div>
		<div id="darkBack"></div>
  <div id="popUp">
  <div id="close" class="close"><i class="fa fa-times"></i></div>
    <div id="new"><span>Privacy policy</span></div>
    <h2>I'm a notification popup that isn't too distracting or in your face. Scroll down or close me and I will go away. You'll still be able to open me later on don't worry.<p align="center" ><a > privacy statment</a></p></h2>
    <form>
      <div>
        <input type="checkbox" id="privacyPolicy" name="policy" value="newsletter" onclick="myFunction3()">
        <label  for="privacyPolicy">Please tick the box to agree to the terms and conditions?</label>
        <p></p>
        <blink id="warning" style="display:none;color:red;text-align:center;text-decoartion:blink;">Warning: You need to tick the box in order to procced.</blink>
      </div>
      <div id="notification-dropdown">    
        <button id="button" class="btn btn-4 btn-4a icon-arrow-right" style="display:none">Continue</button>
      </div>
    </form>
  </div>
  <div id="plus"><span>NEW<br>&nbsp;&nbsp;<i class="fa fa-plus"></i></span></div>
	</header><!-- #masthead -->
	