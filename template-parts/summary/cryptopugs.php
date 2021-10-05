<?php
    require_once(get_template_directory() . '/helpers/collection.helper.php');

    $collection = $args['collection'];
    $types = get_terms('collections', [
        'parent' => $collection->term_id,
        'hide_empty' => false,
    ]);

    $commonCollection = findCollectionByType($types, 'common');
    $maxCommonCount = get_field('tokens_count', $commonCollection->taxonomy . '_' . $commonCollection->term_id);

    $exclusiveCollection = findCollectionByType($types, 'exclusive');
    $maxExclusiveCount = get_field('tokens_count', $exclusiveCollection->taxonomy . '_' . $exclusiveCollection->term_id);

    $commonPugs = get_posts([
        'numberposts' => -1,
        'post_type'   => 'tokens',
        'tax_query' => [
            [
                'taxonomy' => 'collections',
                'field' => 'term_id',
                'terms' => $commonCollection->term_id,
            ]
        ]
    ]);

    $exclusivePugs = get_posts([
        'numberposts' => -1,
        'post_type'   => 'tokens',
        'tax_query' => [
            [
                'taxonomy' => 'collections',
                'field' => 'term_id',
                'terms' => $exclusiveCollection->term_id,
            ]
        ]
    ]);
?>

<div class="summary">
    <div class="summary__table summary-table">
        <div class="summary-table__row">
            <div class="summary-table__cell summary-table__cell_header"><?= __('Simple pugs', 'pugs') ?></div>
            <div class="summary-table__cell summary-table__cell_accent"><?= __('Exclusive pugs', 'pugs') ?></div>
        </div>

        <div class="summary-table__row">
            <div class="summary-table__cell">
                <div class="summary-table__number"><?= count($commonPugs) ?></div>
                <div class="summary-table__description"><?= __('Items now', 'pugs') ?></div>
            </div>
            <div class="summary-table__cell">
                <div class="summary-table__number"><?= count($exclusivePugs) ?></div>
                <div class="summary-table__description"><?= __('Items now', 'pugs') ?></div>
            </div>
        </div>

        <div class="summary-table__row">
            <div class="summary-table__cell">
                <div class="summary-table__number"><?= $maxCommonCount; ?></div>
                <div class="summary-table__description"><?= __('Items will be', 'pugs') ?></div>
            </div>
            <div class="summary-table__cell">
                <div class="summary-table__number"><?= $maxExclusiveCount; ?></div>
                <div class="summary-table__description"><?= __('Items will be', 'pugs') ?></div>
            </div>
        </div>
    </div>
</div>