<?php
    $contact = $args['contact'];
    $imageSrc = get_field('photo', $contact->ID);

    $twitter = get_field('twitter', $contact->ID);
    $twitterLink = "https://twitter.com/" . $twitter;

    $telegram = get_field('telegram', $contact->ID);
    $telegramLink = "https://telegram.me/" . $telegram;

    $instagram = get_field('instagram', $contact->ID);
    $instagramLink = "https://www.instagram.com/" . $instagram;
?>

<div class="people__card">
    <img class="people__photo" src="<?= $imageSrc ?>" alt="<?= $contact->post_title ?>">
    <h2 class="people__name"><?= $contact->post_title ?></h2>
    <span class="people__post"><?= $contact->post_content ?></span>
    <ul class="people__socials socials">
        <li class="socials__link socials__link_twitter"><a href="<?= $twitterLink ?>" target="_blank"><?= $twitter ?></a></li>
        <li class="socials__link socials__link_telegram"><a href="<?= $telegramLink ?>" target="_blank"><?= $telegram ?></a></li>
        <li class="socials__link socials__link_instagram"><a href="<?= $instagramLink ?>" target="_blank"><?= $instagram ?></a></li>
    </ul>
</div>

