<?php
    $collection = $args['collection'];
    $messages = get_posts([
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
?>

<h2 class="collection__subtitle"><?= __('All Messages', 'pugs'); ?></h2>

<div class="secret-messages">
    <?php foreach ($messages as $message): ?>
        <?php get_template_part( 'template-parts/token-secret-message', null, [
            'message' => $message,
        ]); ?>
    <?php endforeach; ?>
</div>