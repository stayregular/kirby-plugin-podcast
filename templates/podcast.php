<?php snippet('header') ?>

  <main class="main" role="main">

    <?php snippet('article', ['article' => $page, 'type' => 'normal']) ?>

    <?php snippet('prevnext', ['flip' => true]) ?>

  </main>

<?php snippet('footer') ?>
