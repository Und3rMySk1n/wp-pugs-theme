<?php
    $collection = $args['collection'];
    $types = $args['types'];
    $currentType = $args['currentType'];
    $allTokensText = $args['allTokensText'];

    $homeUrl = get_home_url();
?>

<ul class="tokens-navigation">
    <li class="tokens-navigation__item">
        <a
            class="tokens-navigation__link <?= ($currentType === '' ? 'tokens-navigation__link_active' : '') ?>"
            href="<?= add_query_arg(['collections' => $collection->slug], $homeUrl); ?>"
        >
            <?= $allTokensText ?>
        </a>
    </li>
    <?php foreach ($types as $type): ?>
        <?php
            $link = add_query_arg([
                'collections' => $collection->slug,
                'type' => $type->slug,
            ], $homeUrl);
            $additionalClass = ($currentType == $type->slug) ? 'tokens-navigation__link_active' : '';
        ?>
        <li class="tokens-navigation__item">
            <a
                class="tokens-navigation__link <?= $additionalClass ?>"
                href="<?= $link ?>"
            >
                <?= $type->name ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>