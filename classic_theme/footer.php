<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Classic_theme
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer row" role="contentinfo">
		<div class="container-fluid">
			<div class="site-info">
				<nav id="site-navigation" class="main-navigation bottom-nav clearfix col-md-4 col-sm-4 col-xs-12" role="navigation">
					<?php wp_nav_menu( array( 'theme_location' => 'footer', 'menu_id' => 'footer-menu' ) ); ?>
				</nav>
				<div class="social-icon col-md-4 col-sm-4">
					<ul>
						<li><a class="fa fa-twitter" href="<?php echo get_theme_mod('social_icon_twitter');?>"></a></li>
						<li><a class="fa fa-facebook" href="<?php echo get_theme_mod('social_icon_facebook');?>"></a></li>
						<li><a class="fa fa-pinterest-p" href="<?php echo get_theme_mod('social_icon_pinterest');?>"></a></li>
						<li><a class="fa fa-google-plus" href="<?php echo get_theme_mod('social_icon_google');?>"></a></li>
					</ul>
				</div>
				<span class="copyright col-md-4 col-sm-4">© Copyright 2013 <a href="http://freebiesxpress.com/">DesignerFirst.com</a></span>

			</div><!-- .site-info -->
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
