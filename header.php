<!DOCTYPE html>
<html>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= wp_get_document_title(); ?></title>

        <link rel="icon" href="/favicon.svg">    
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

        <?php wp_head(); ?>
    </head>

    <body class="main">
        <?php get_template_part( 'template-parts/header' ); ?>
        <div class="content">