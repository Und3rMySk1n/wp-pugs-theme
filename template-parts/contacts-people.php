<?php
    $people = get_posts([
        'numberposts' => -1,
        'post_type'   => 'contacts',
        'order' => 'ASC',
    ]);
?>

<div class="contacts__people people">
    <?php foreach ($people as $contact): ?>
        <?php get_template_part('template-parts/contacts-people-contact', null, [
            'contact' => $contact,
        ]); ?>
    <?php endforeach; ?>
</div>