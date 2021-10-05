<?php
    require_once(get_template_directory() . '/helpers/collection.helper.php');

    $collection = $args['collection'];
    $types = get_terms('collections', [
        'parent' => $collection->term_id,
        'hide_empty' => false,
    ]);
    $currentType = (isset($_GET['type']) ? $_GET['type'] : '');

    $pugs = [];
    $pugs['all'] = get_posts([
        'numberposts' => -1,
        'post_type'   => 'tokens',
        'tax_query' => [
            [
                'taxonomy' => 'collections',
                'field' => 'term_id',
                'terms' => $collection->term_id,
            ]
        ]
    ]);

    foreach ($types as $type) {
        $pugs[$type->slug] = get_posts([
            'numberposts' => -1,
            'post_type'   => 'tokens',
            'tax_query' => [
                [
                    'taxonomy' => 'collections',
                    'field' => 'term_id',
                    'terms' => $type->term_id,
                ]
            ]
        ]);
    }
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

<div id="tokensCollection">
    <div class="crypto-pugs active visible" data-collection="all">
        <?php foreach ($pugs['all'] as $pug): ?>
            <?php get_template_part( 'template-parts/token-pug', null, [
                'pug' => $pug,
            ]); ?>
        <?php endforeach; ?>
    </div>

    <?php foreach ($types as $type): ?>
        <div class="crypto-pugs hidden" data-collection="<?= $type->slug ?>">
            <?php foreach ($pugs[$type->slug] as $pug): ?>
                <?php get_template_part( 'template-parts/token-pug', null, [
                    'pug' => $pug,
                ]); ?>
            <?php endforeach; ?>
        </div>
    <?php endforeach; ?>
</div>