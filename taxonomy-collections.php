<?php
    $slug = get_query_var('term');
    $term = get_term_by('slug', $slug, get_query_var('taxonomy'));

    $text = get_field('text', $term->taxonomy . '_' . $term->term_id);
    $iconSrc = get_field('collection_icon', $term->taxonomy . '_' . $term->term_id);
    $imageSrc = get_field('collection_page_image', $term->taxonomy . '_' . $term->term_id);

    get_header();
?>

<div class="collection">
    <div class="collection__image" style="background-image: url('<?= $imageSrc ?>')"></div>
    <div class="collection__info">
        <img class="collection__icon" src="<?= $iconSrc ?>" alt="<?= $term->name . ' ' . __('Icon', 'pugs') ?>">
        <h1 class="collection__title"><?= $term->name ?></h1>
        <p class="collection__description"><?= $text ?></p>
    </div>
    
    <div class="collection__tokens">
        <?php get_template_part( 'template-parts/tokens-' .  $slug, null, [
            'collection' => $term,
        ]); ?>
    </div>
</div>

<?php
    get_footer();