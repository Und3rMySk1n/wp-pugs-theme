<?php
    require_once(get_template_directory() . '/helpers/collection.helper.php');

    $pug = $args['pug'];
    $imageSrc = get_field('image', $pug->ID);
    $link = get_field('link', $pug->ID);

    $types = get_the_terms($pug->ID, 'collections');
    $type = (count($types) !== 0) ? $types[0] : null;
?>

<div class="crypto-pugs__card">
    <div class="crypto-pugs__image-wrapper">
        <a class="crypto-pugs__link" href="<?= $link ?>" target="_blank"></a>
        <img
            src="<?= $imageSrc ?>"
            class="crypto-pugs__image"
            alt="<?= $pug->post_title ?>"
        >
    </div>
    <div class="crypto-pugs__data">
        <h3 class="crypto-pugs__name"><?= $pug->post_title ?></h3>
        <span class="crypto-pugs__type"><?= $type ? $type->name : '' ?></span>
    </div>
</div>