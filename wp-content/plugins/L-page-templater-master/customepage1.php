<?php
/**
 * Template Name: Laz's Contact
 * * Description: Displays the Home page with Parallax effects.
 *
 */
?>

<?php

if(is_page(contact))
{

get_header('contact');
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <?php
        // Start the loop.
        while ( have_posts() ) : the_post();

            // Include the page content template.
            get_template_part( 'template-parts/content', 'page' );

            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) {
                comments_template();
            }

            // End of the loop.
        endwhile;
        ?>
<!---- POPUP FOR ---->
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
		</header><!-- #masthead -->
    </main><!-- .site-main -->

    <?php get_sidebar( 'content-bottom' ); ?>

</div><!-- .content-area -->



<?php get_sidebar(); ?>
<?php get_footer(); ?>
