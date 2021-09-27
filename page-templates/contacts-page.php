<?php
/*
Template Name: Contacts Page
*/

get_header();
wp_reset_query();
while (have_posts()): the_post();
?>

<div class="contacts">
    <div class="contacts__description">
        <h1 class="contacts__title"><?php the_title(); ?></h1>
        <div class="contacts__text"><?php the_content(); ?></div>
    </div>
</div>

<?php get_template_part( 'template-parts/contacts-people' ); ?>

<?php 
endwhile;
get_footer();