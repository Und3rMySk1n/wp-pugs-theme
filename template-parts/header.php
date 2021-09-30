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
      <div class="header__menu" id="topMenu">
        <?php wp_nav_menu(); ?> 
      </div>
    </div>
    <div class="header__hamburger hamburger">
      <button class="hamburger__button" id="hamburger">
        <span class="hamburger__line hamburger__line_top"></span>
        <span class="hamburger__line hamburger__line_middle"></span>
        <span class="hamburger__line hamburger__line_bottom"></span>
      </button>
    </div>
  </div>
  <div class="header__expanded"></div>
</header>