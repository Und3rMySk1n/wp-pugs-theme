<?php
    require_once(get_template_directory() . '/helpers/collection.helper.php');

    $collection = $args['collection'];
    $types = get_terms('collections', [
        'parent' => $collection->term_id,
        'hide_empty' => false,
    ]);
    
    $currentType = (isset($_GET['type']) ? $_GET['type'] : '');
    $currentCollection = !$currentType ? $collection : findCollectionByType($types, $currentType);
    $pugs = $currentCollection ? get_posts([
        'numberposts' => -1,
        'post_type'   => 'tokens',
        'tax_query' => [
            [
                'taxonomy' => 'collections',
                'field' => 'term_id',
                'terms' => $currentCollection->term_id,
            ]
        ]
    ]) : [];
?>

<h2 class="collection__subtitle"><?= __('All Pugs', 'pugs'); ?></h2>

<div class="collection__navigation">
    <?php get_template_part( 'template-parts/tokens-navigation', null, [
        'collection' => $collection,
        'types' => $types,
        'currentType' => $currentType,
        'allTokensText' =>  __('All pugs', 'pugs'),
    ]); ?>
</div>

<div class="crypto-pugs">
    <?php foreach ($pugs as $pug): ?>
        <?php get_template_part( 'template-parts/token-pug', null, [
            'pug' => $pug,
        ]); ?>
    <?php endforeach; ?>
</div>
