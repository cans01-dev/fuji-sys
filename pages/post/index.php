<?php require 'templates/header.php'; ?>
<main>
  <div class="subpage-h2">
    <div class="noborder">
      <h2 class="section-h2"><span>N</span>ews
        <div><span></span><p>お知らせ</p></div>
      </h2>
    </div>
  </div>

  <div class="breadcrumb">
    <div class="border">
      <p>
        <a href="/">TOP</a> 〉
        <a href="/posts">NEWS</a>
      </p>
    </div>
  </div>

  <div class="search-result">
    <div class="search-results">
      <ul class="grid-list">
        <?php foreach ($posts as $post): ?>
          <li class="grid-item">
            <a href="/posts/<?= $post->id ?>">
              <img src="<?= $post->getImageUrl("image") ?>" alt="">
              <div>
                <p>
                  <?= $post->title ?>
                  <span style="font-size: 0.875rem; color: white; margin-left: 0.25rem;">
                    <?= $post->published_at->diffForHumans() ?>
                  </span>
                </p>
              </div>
            </a>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>

  <?php require 'templates/line.php'; ?>
</main>
<script src="../assets/script/clean_query.js" defer></script>
<script src="../assets/script/search.js" defer></script>

<?php require 'templates/footer.php'; ?>