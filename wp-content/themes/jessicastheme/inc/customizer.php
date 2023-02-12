<?php
/**
 * Jessica\'s Theme Theme Customizer
 *
 * @package Jessica's Theme
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function jessicastheme_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'jessicastheme_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'jessicastheme_customize_partial_blogdescription',
			)
		);
	}
}
add_action( 'customize_register', 'jessicastheme_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function jessicastheme_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function jessicastheme_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function jessicastheme_customize_preview_js() {
	wp_enqueue_script( 'jessicastheme-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), _S_VERSION, true );
}
add_action( 'customize_preview_init', 'jessicastheme_customize_preview_js' );


/**
 * Social media buttons
 */

 function socials_array() {
	return array(
		'LinkedIn',
		'Instagram',
		'GitHub',
	);
 }

 function jm_custom_socials($wp_customize) {
	$socials_array = socials_array();
	$priority = 5;

	$wp_customize -> add_section('social_settings', array(
			'title' => _x('Social Media Links', 'text-domain'),
			'priority' => 35,
		)
	);

	foreach ($socials_array as $social) {
		$wp_customize->add_setting("$social", array(
				'type' => 'theme_mod',
				'capability' => 'edit_theme_options'
			)
		);

		$wp_customize->add_control($social, array(
				'label' => _x("$social URL", 'text-domain'),
				'section' => 'social_settings',
				'type' => 'text',
				'priority' => "$priority"
			)
		);

		$priority = $priority + 5;
	}
 }

 add_action('customize_register', 'jm_custom_socials');

 function jm_output_socials() {
	$socials_array = socials_array();

	foreach ($socials_array as $social) {
		if (strlen(get_theme_mod($social)) > 0) {
			$active[] = $social;
		}
	}

	echo '<div class="socials-container">';

	if (!empty($active)) {
		echo '<div class="socials-inner">';
		foreach ($active as $site) {
			$url = esc_url(get_theme_mod($site));
			switch($site) {
				case "LinkedIn":
					echo '<!--LinkedIn-->
					<a href='.$url.'target="blank">
					<svg width="65" height="65" viewBox="0 0 65 65" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M51.4583 8.125C52.8949 8.125 54.2727 8.69568 55.2885 9.7115C56.3043 10.7273 56.875 12.1051 56.875 13.5417V51.4583C56.875 52.8949 56.3043 54.2727 55.2885 55.2885C54.2727 56.3043 52.8949 56.875 51.4583 56.875H13.5417C12.1051 56.875 10.7273 56.3043 9.7115 55.2885C8.69568 54.2727 8.125 52.8949 8.125 51.4583V13.5417C8.125 12.1051 8.69568 10.7273 9.7115 9.7115C10.7273 8.69568 12.1051 8.125 13.5417 8.125H51.4583ZM50.1042 50.1042V35.75C50.1042 33.4084 49.174 31.1626 47.5182 29.5068C45.8624 27.851 43.6166 26.9208 41.275 26.9208C38.9729 26.9208 36.2917 28.3292 34.9917 30.4417V27.4354H27.4354V50.1042H34.9917V36.7521C34.9917 34.6667 36.6708 32.9604 38.7563 32.9604C39.7619 32.9604 40.7263 33.3599 41.4374 34.071C42.1484 34.782 42.5479 35.7465 42.5479 36.7521V50.1042H50.1042ZM18.6333 23.1833C19.8401 23.1833 20.9974 22.704 21.8507 21.8507C22.704 20.9974 23.1833 19.8401 23.1833 18.6333C23.1833 16.1146 21.1521 14.0562 18.6333 14.0562C17.4194 14.0562 16.2552 14.5385 15.3968 15.3968C14.5385 16.2552 14.0562 17.4194 14.0562 18.6333C14.0562 21.1521 16.1146 23.1833 18.6333 23.1833ZM22.3979 50.1042V27.4354H14.8958V50.1042H22.3979Z" fill="#474A66"/>
					</svg>
					</a>';
					break;
				case "Instagram":
					echo '<!--Instagram-->
					<a href='.$url.'target="blank">
					<svg width="64" height="65" viewBox="0 0 64 65" fill="none" xmlns="http://www.w3.org/2000/svg">
					<g filter="url(#filter0_d_129_41)">
					<path d="M40 32C40 33.5823 39.5308 35.129 38.6518 36.4446C37.7727 37.7602 36.5233 38.7855 35.0615 39.391C33.5997 39.9965 31.9911 40.155 30.4393 39.8463C28.8874 39.5376 27.462 38.7757 26.3431 37.6569C25.2243 36.538 24.4624 35.1126 24.1537 33.5607C23.845 32.0089 24.0035 30.4003 24.609 28.9385C25.2145 27.4767 26.2398 26.2273 27.5554 25.3482C28.871 24.4692 30.4177 24 32 24C34.1197 24.0066 36.1507 24.8516 37.6496 26.3504C39.1484 27.8493 39.9934 29.8803 40 32ZM57 21V43C57 46.713 55.525 50.274 52.8995 52.8995C50.274 55.525 46.713 57 43 57H21C17.287 57 13.726 55.525 11.1005 52.8995C8.475 50.274 7 46.713 7 43V21C7 17.287 8.475 13.726 11.1005 11.1005C13.726 8.475 17.287 7 21 7H43C46.713 7 50.274 8.475 52.8995 11.1005C55.525 13.726 57 17.287 57 21ZM44 32C44 29.6266 43.2962 27.3065 41.9776 25.3332C40.6591 23.3598 38.7849 21.8217 36.5922 20.9134C34.3995 20.0052 31.9867 19.7676 29.6589 20.2306C27.3311 20.6936 25.1929 21.8365 23.5147 23.5147C21.8365 25.1929 20.6936 27.3311 20.2306 29.6589C19.7676 31.9867 20.0052 34.3995 20.9134 36.5922C21.8217 38.7849 23.3598 40.6591 25.3332 41.9776C27.3065 43.2962 29.6266 44 32 44C35.1826 44 38.2348 42.7357 40.4853 40.4853C42.7357 38.2348 44 35.1826 44 32ZM48 19C48 18.4067 47.8241 17.8266 47.4944 17.3333C47.1648 16.8399 46.6962 16.4554 46.148 16.2284C45.5999 16.0013 44.9967 15.9419 44.4147 16.0576C43.8328 16.1734 43.2982 16.4591 42.8787 16.8787C42.4591 17.2982 42.1734 17.8328 42.0576 18.4147C41.9419 18.9967 42.0013 19.5999 42.2284 20.1481C42.4554 20.6962 42.8399 21.1648 43.3333 21.4944C43.8266 21.8241 44.4067 22 45 22C45.7956 22 46.5587 21.6839 47.1213 21.1213C47.6839 20.5587 48 19.7956 48 19Z" fill="#474A66"/>
					</g>
					<defs>
					<filter id="filter0_d_129_41" x="-4" y="0" width="72" height="72" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
					<feFlood flood-opacity="0" result="BackgroundImageFix"/>
					<feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
					<feOffset dy="4"/>
					<feGaussianBlur stdDeviation="2"/>
					<feComposite in2="hardAlpha" operator="out"/>
					<feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
					<feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_129_41"/>
					<feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_129_41" result="shape"/>
					</filter>
					</defs>
					</svg>
					</a>';
					break;
				case "GitHub":
					echo '<!--GitHub-->
					<a href='.$url.'target="blank">
					<svg width="65" height="67" viewBox="0 0 65 67" fill="none" xmlns="http://www.w3.org/2000/svg">
					<g filter="url(#filter0_d_129_44)">
					<path d="M32.4998 5.41666C28.9432 5.41666 25.4214 6.11719 22.1355 7.47825C18.8496 8.83932 15.8639 10.8343 13.349 13.3492C8.26992 18.4283 5.4165 25.317 5.4165 32.5C5.4165 44.4708 13.1894 54.6271 23.9415 58.2292C25.2957 58.4458 25.729 57.6062 25.729 56.875V52.2979C18.2269 53.9229 16.629 48.6687 16.629 48.6687C15.3832 45.5271 13.6228 44.6875 13.6228 44.6875C11.1582 43.0083 13.8123 43.0625 13.8123 43.0625C16.5207 43.2521 17.9561 45.8521 17.9561 45.8521C20.3123 49.9687 24.2936 48.75 25.8373 48.1C26.0811 46.3396 26.7853 45.1479 27.5436 44.4708C21.5311 43.7937 15.2207 41.4646 15.2207 31.1458C15.2207 28.1396 16.2498 25.7292 18.0103 23.8062C17.7394 23.1292 16.7915 20.3125 18.2811 16.6562C18.2811 16.6562 20.5561 15.925 25.729 19.4187C27.8686 18.8229 30.1978 18.525 32.4998 18.525C34.8019 18.525 37.1311 18.8229 39.2707 19.4187C44.4436 15.925 46.7186 16.6562 46.7186 16.6562C48.2082 20.3125 47.2603 23.1292 46.9894 23.8062C48.7498 25.7292 49.779 28.1396 49.779 31.1458C49.779 41.4917 43.4415 43.7667 37.4019 44.4437C38.3769 45.2833 39.2707 46.9354 39.2707 49.4542V56.875C39.2707 57.6062 39.704 58.4729 41.0853 58.2292C51.8373 54.6 59.5832 44.4708 59.5832 32.5C59.5832 28.9434 58.8826 25.4215 57.5216 22.1356C56.1605 18.8497 54.1656 15.8641 51.6506 13.3492C49.1357 10.8343 46.1501 8.83932 42.8642 7.47825C39.5783 6.11719 36.0565 5.41666 32.4998 5.41666Z" fill="#474A66"/>
					</g>
					<defs>
					<filter id="filter0_d_129_44" x="-4" y="0" width="73" height="73" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
					<feFlood flood-opacity="0" result="BackgroundImageFix"/>
					<feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
					<feOffset dy="4"/>
					<feGaussianBlur stdDeviation="2"/>
					<feComposite in2="hardAlpha" operator="out"/>
					<feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
					<feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_129_44"/>
					<feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_129_44" result="shape"/>
					</filter>
					</defs>
					</svg>
					</a>';
					break;
				default:
					echo '<!--No socials added-->';
		
			}
		}
		echo '</div>';
	}

	echo '</div>';

 }

