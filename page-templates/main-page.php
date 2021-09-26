<?php
/*
Template Name: Main Page
*/

get_header();
wp_reset_query();
while (have_posts()): the_post();
?>

<div class="about-me">
    <div class="about-me__photo">
        <?php if( get_field('photo') ): ?>
            <img src="<?php the_field('photo'); ?>" alt="Evan Burns">
        <?php endif; ?>
    </div>
    <div class="about-me__info">
        <h1 class="about-me__title">
            <?php the_title(); ?>
        </h1>
        <div class="about-me__text">
            <?php the_content(); ?>
        </div>
        <div class="about-me__contacts">
            <?php if( get_field('contact_me_link') ): ?>
                <a
                    class="about-me__link button button_stroked"
                    title="Contact me"
                    href="<?php the_field('contact_me_link'); ?>"
                    target="_blank"
                >
                    <?= __('Contact me', 'pugs') ?>
                </a>
            <?php endif; ?>

            <?php if( get_field('sign') ): ?>
                <img src="<?php the_field('sign'); ?>" alt="Sign" class="about-me__sign">
            <?php endif; ?>
        </div>
    </div>
</div>

<?php get_template_part( 'template-parts/collection-list' ); ?>

<?php 
endwhile;
get_footer();