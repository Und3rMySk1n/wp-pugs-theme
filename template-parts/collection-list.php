<?php
    $collections = get_terms( 'collections', [
        'parent' => 0,
        'hide_empty' => false,
    ] );
?>

<div class="collection-list">
    <div class="collection-list__content">
        <h2 class="collection-list__title"><?= __('NFT collections', 'pugs') ?></h2>
        <?php 
            foreach ($collections as $collection)
            {
                get_template_part('template-parts/collection-list-item', null, [
                    'collection' => $collection,
                ]);
            }
        ?>
    </div>
</div>