<?php snippet('header') ?>

  <main class="main blog" role="main">

    <div class="Box container" id="latest">
      <div class="row">
        <?php if($podcasts->count() > 1): ?>
          <div class="Box_header">
            <h2>Latest Podcast Episodes</h2>
            <span class="category green"></span>
          </div>
        <?php elseif($podcasts->count() == 1): ?>
          <div class="Box_header Box_header_sml">
            <span class="category green"></span>
          </div>
        <?php endif ?>

    <div class="Box_content">
      <div class="row">
        <?php if($podcasts->count()): ?>

          <?php if($podcasts->count() > 1): ?>
              <?php // Blog archive ?>
              <?php snippet('blognav', array('cat' => 'podcast')) ?>
              <?php foreach($podcasts as $podcast): ?>
                <?php // for first article, make featured and big ?>

                <?php snippet('articlesml', ['article' => $podcast, 'type' => 'archive']) ?>

              <?php endforeach ?>
          <?php elseif($podcasts->count() == 1): ?>
            <?php foreach($podcasts as $podcast): ?>
              <?php snippet('articlesml', ['article' => $podcast, 'type' => 'single']) ?>

            <?php endforeach ?>
          <?php endif ?>
        <?php else: ?>
          <p>This podcast does not contain any episodes yet.</p>
        <?php endif ?>
      </div>
    </div>
  </div>
</div>

    <?php snippet('pagination') ?>

  </main>

<?php snippet('footer') ?>
