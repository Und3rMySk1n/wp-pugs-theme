<?php
    $collection = $args['collection'];
    $imageSrc = get_field('gallery_image', $collection->taxonomy . '_' . $collection->term_id);
    $iconSrc = get_field('collection_icon', $collection->taxonomy . '_' . $collection->term_id);
    $link = get_term_link($collection);
?>

<div class="collection-list-item">
    <a href="<?= $link ?>" class="collection-list-item__link"></a>
    <div class="collection-list-item__image">
        <img src="<?= $imageSrc ?>" alt="<?= $collection->name ?> Image">
    </div>
    <div class="collection-list-item__data">
        <img class="collection-list-item__icon" src="<?= $iconSrc ?>" alt="<?= $collection->name ?> Icon">
        <div class="collection-list-item__text">
            <h3 class="collection-list-item__title"><?= $collection->name ?></h3>
            <p class="collection-list-item__description"><?= $collection->description ?></p>
        </div>
    </div>
</div>