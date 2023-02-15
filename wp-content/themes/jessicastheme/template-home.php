<?php
/**
 * Template Name: Home
 *  @package Jessica's Theme
 */

 //Vars
 $portfolio = get_field('portfolio');
 $skills = get_field('skills');

 get_header();

 get_template_part('template-parts/components/hero');

 get_template_part('template-parts/components/post-display', null, array('portfolio' => $portfolio));

 get_template_part('template-parts/components/post-display', null, array('skills' => $skills));

 get_template_part('template-parts/components/copy-section');

 get_template_part('template-parts/components/closer');

 get_footer();