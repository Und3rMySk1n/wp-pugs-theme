<?php
/*
Template Name: Collections Page
*/

get_header();
wp_reset_query();
while (have_posts()): the_post();
?>

<?php get_template_part( 'template-parts/collection-list' ); ?>

<?php 
endwhile;
get_footer();