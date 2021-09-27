<?php
    require_once(get_template_directory() . '/helpers/collection.helper.php');

    $pug = $args['pug'];
    $imageData = get_field('image', $pug->ID);
    $link = get_field('link', $pug->ID);
    $srcSet = getSrcSet($imageData['sizes']['pug'], $imageData['url']);

    $types = get_the_terms($pug->ID, 'collections');
    $type = (count($types) !== 0) ? $types[0] : null;
?>

<div class="crypto-pugs__card">
    <div class="crypto-pugs__image-wrapper">
        <a class="crypto-pugs__link" href="<?= $link ?>" target="_blank"></a>
        <img
            src="<?= $imageData['sizes']['pug'] ?>"
            srcset="<?= $srcSet ?>"
            class="crypto-pugs__image"
            sizes="<?= $imageData['sizes']['pug-width'] ?>px"
            alt="<?= $pug->post_title ?>"
        >
    </div>
    <div class="crypto-pugs__data">
        <h3 class="crypto-pugs__name"><?= $pug->post_title ?></h3>
        <span class="crypto-pugs__type"><?= $type ? $type->name : '' ?></span>
    </div>
</div>