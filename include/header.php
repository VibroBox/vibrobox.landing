<header class="header">
  <a href="<?= BaseURL() ?>" class="logo"></a>

  <?php if (count(GetPageTranslationsExcludingCurrentLang()) > 0) : ?>
  <ul class="languages no-print">
    <?php foreach (GetPageTranslationsExcludingCurrentLang() as $key => $t) : ?>
    <li>
      <a hreflang="<?= $key ?>" href="<?= $t['url'] ?>" rel="alternate">
        <?= $t['title'] ?>
      </a>
    </li>
    <?php endforeach; ?>
  </ul>
  <?php endif; ?>

  <!-- Hidden checkbox is used for pure CSS toggle menu. -->
  <input type="checkbox" id="menu__trigger" class="menu__trigger" />
  <label class="no-print" for="menu__trigger"><?= T('Menu') ?></label>

  <ul class="menu no-print">
    <?php foreach (MainMenu() as $m) : ?>
    <li class="menu__item">
      <a class="menu__link<?php if ($m->isCurrent) echo ' menu__link--selected'?>" href="<?= $m->url ?>"><?= $m->title ?></a>
    </li>
    <?php endforeach; ?>
    <li class="menu__item menu__item--login">
      <a class="menu__link menu__link--login" href="<?= DEMO_URL ?>" target="_blank"><?= T('loginButton') ?></a>
    </li>
  </ul>
</header>
