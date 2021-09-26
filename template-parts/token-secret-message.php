<?php
    $message = $args['message'];
    $imageSrc = get_field('image', $message->ID);
    $link = get_field('link', $message->ID);
?>

<div class="secret-messages__card">
    <a class="secret-messages__link" href="<?= $link ?>" target="_blank"></a>   
    <img src="<?= $imageSrc ?>" class="secret-messages__image" alt="<?= $message->post_title ?>">
</div>