<header class="header">
  <div class="header__expanded">
    <div class="header__logo"></div>
  </div>
  <div class="header__content">
    <div class="header__sitename">
      <?= get_bloginfo('name') ?> /
      <span class="header__description"><?= get_bloginfo('description') ?></span>
    </div>
    <div class="header__navigation">
      <div class="header__menu">
        <?php wp_nav_menu(); ?> 
      </div>
      <div class="header__links"></div>
    </div>
  </div>
  <div class="header__expanded"></div>
</header>