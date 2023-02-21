<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Jessica's Theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'jessicastheme' ); ?></a>

	<header id="masthead" class="site-header content-width">
		<div class="header-inner inner">
			<div class="site-branding">
				<?php
				the_custom_logo();
				?>
			</div>

			<div class="navigation-outer">
				<a class="menu-toggler">
					<div class="anim"></div>
					<div class="move"></div>
					<div class="anim"></div>
				</a>
			</div>
		</div>
		<div class="menu-outer" role="navigation" aria-label="Main Navigation" aria-expanded="false">
					<div class="menu-inner">
						<nav id="site-navigation" class="main-navigation">
							<?php
							wp_nav_menu(
								array(
									'theme_location' => 'menu-1',
									'menu_id'        => 'primary-menu',
								)
							);
							?>
						</nav>
					</div>
					<div class="socials-outer">
						<?php jm_output_socials(); ?>
					</div>
				</div>
	</header>
