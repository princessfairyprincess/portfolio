<?php
/**
 * Template Name: Home
 *  @package Jessica's Theme
 */

 //Vars

 get_header();

 get_template_part('template-parts/components/hero');

 get_template_part('template-parts/components/post-display', null, array('type' => 'portfolio'));

 get_template_part('template-parts/components/post-display', null, array('type' => 'skills'));

 get_template_part('template-parts/components/copy-section');

 get_template_part('template-parts/components/closer');

 get_footer();