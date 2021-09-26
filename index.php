<?php 
    get_header();
    wp_reset_query();
    while (have_posts()): the_post();
?>

<h1 class="main__title"><?php the_title(); ?></h1>
<div class="main__text"><?php the_content(); ?></div>

<?php
    endwhile;
    get_footer();