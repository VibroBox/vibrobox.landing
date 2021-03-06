<?php
// This include should be the first one in every site's php page.
require_once(dirname(__FILE__).'/../config.php');

// This include should be used only if you want pretty urls and only if web server
// routes all requests to index.php.
//
// Built-in PHP server (which is used for development) routes all requests to index.php by default.
//
// Possible implementation for nginx:
// location / {
//    # Serve static content first, use php as a last resort.
//    try_files $uri $uri/ /index.php$is_args$args;
//  }
// TODO: Move this include to the config.php.
require(dirname(__FILE__).'/../include/uri_routing.php');

// Page properties in the index file should be after the routing.
define('TITLE', 'titleIndexPage');
define('FILE', __FILE__);
define('META', [
  ['property' => 'og:image', 'content' => URL('img/meta/VibroBox_and_vibration_sensor.jpg')],
  ['property' => 'og:image:width', 'content' => '1200'],
  ['property' => 'og:image:height', 'content' => '700'],
]);

HTML_HEAD();

// Initialization of page data models.
const NEWS_DATE_FORMAT = ['default' => 'F j, Y', 'ru' => 'j.n.Y'];
$newsItems = [[
  'date' => '2017-08-11T13:11:21+00:00',
  'link' => T(['default' => 'news/automatic-vibration-diagnostics-was-tested-at-geely-automobile-factory-in-belarus',
  'ru'=> 'новости/испытания-вибродиагностики-vibrobox-на-предприятии-по-производству-автомобилей-geely-в-беларуси']),
  'title' => T(['default' => 'VibroBox vibration diagnostics service was successfully tested at "Geely" automobile factory in Belarus →',
  'ru' => 'Испытания «VibroBox» на совместном белорусско-китайском предприятии по производству автомобилей Geely — СЗАО «БЕЛДЖИ» →'
  ])]
];

$plusSectionItems = [[
    'title' => T('plusAutomaticSystemTitle'),
    'description' => T('plusAutomaticSystemDescription'),
    'icon' => 'plus-icon__automatic'],
  [
    'title' => T('plusEconomyTitle'),
    'description' => T('plusEconomyDescription'),
    'icon' => 'plus-icon__economy'],
  [
    'title' => T('plusAvailabilityTitle'),
    'description' => T('plusAvailabilityDescription'),
    'icon' => 'plus-icon__availability'],
  [
    'title' => T('plusSimplicityTitle'),
    'description' => T('plusSimplicityDescription'),
    'icon' => 'plus-icon__simplicity']
];

$solutionSectionItems = [[
    'title' => T('systemEquipmentTitle'),
    'description' => T('systemEquipmentDescription'),
    'css' => 'system-container__equipment',
    'icon' => 'system-icon__equipment'],
  [
    'title' => T('systemTransferTitle'),
    'description' => T('systemTransferDescription'),
    'css' => 'system-container__transfer',
    'icon' => 'system-icon__transfer'],
  [
    'title' => T('systemProcessingTitle'),
    'description' => T('systemProcessingDescription'),
    'css' => 'system-container__processing',
    'icon' => 'system-icon__processing'],
  [
    'title' => T('systemGReportTitle'),
    'description' => T('systemGReportDescription'),
    'css' => 'system-container__g-report',
    'icon' => 'system-icon__g-report'],
  [
    'title' => T('systemUReportTitle'),
    'description' => T('systemUReportDescription'),
    'css' => 'system-container__u-report',
    'icon' => 'system-icon__u-report']
];
?>

<body>
<?php HTML_HEADER(); ?>

<main role="main">

  <section class="banner">
    <div class="section">
      <h1 class="title-index__main"><?= T('indexMainTitle') ?></h1>
      <div class="preface preface--home"><?= T('indexPreface') ?></div>
      <a class="actionButton" href="<?= URL('technology.php') ?>"><?= T('moreAboutTechnology') ?></a>
      <a class="actionButton" href="<?= DEMO_URL ?>" target="_blank"><?= T('viewDemo') ?></a>
    </div>
  </section>

  <section class="section news__section">
    <ul>
      <?php foreach ($newsItems as $news) : ?><li>
        <time class="newsDate" datetime="<?= $news['date'] ?>" itemprop="datePublished"><?= (new DateTime($news['date']))->format(T(NEWS_DATE_FORMAT)) ?></time>
        <a href="<?= URL($news['link']) ?>"><?= $news['title'] ?></a>
      </li><?php endforeach; ?>

    </ul>
  </section>

  <section class="section system separator">
    <h2 class="title-index__second"><?= T("systemItem") ?></h2>
    <p class="preface"><?= T("systemPreface") ?></p>
    <div class="system-container">
      <?php foreach ($solutionSectionItems as $item) : ?>
      <div class="system-container__item  <?= $item['css'] ?> ">
        <h3 class="system-container__title system-icon <?= $item['icon'] ?>">
          <?= $item['title'] ?>
        </h3>
        <p class="system-container__text"><?= $item['description'] ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </section>

  <section class="section plus">
    <h2 class="title-index__second"><?= T("plusTitle") ?></h2>
    <div class="plus-container">
      <?php foreach ($plusSectionItems as $item) : ?>
      <div class="plus-container__item">
        <h3 class="plus-container__title plus-icon <?= $item['icon'] ?>">
          <span><?= $item['title'] ?></span>
        </h3>
        <p class="plus-container__text"><?= $item['description'] ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </section>

  <section class="preface">
    <a class="actionButton" href="<?= URL('technology.php') ?>">
      <p><?= T('bottomIndexTechButton') ?></p>
    </a>
  </section>
</main>
<?php HTML_ASIDE(); ?>
<?php HTML_FOOTER(); ?>

</body>
</html>
