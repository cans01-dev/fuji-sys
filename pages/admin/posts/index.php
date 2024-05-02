<?php require 'templates/admin/header.php' ?>

<main>
  <div class="subpage-h2">
    <div>
      <h2 class="section-h2">投稿一覧
        <div><span></span><p>posts</p></div>
      </h2>
    </div>
  </div>
  <div class="admin-mansions">
    <div class="search-results">
      <ul class="mansion-list">
        <?php foreach ($posts as $post): ?>
          <li class="mansion-item">
            <div class="item-icon">
              <img src="<?= $post->getImageUrl("image") ?>" alt="">
            </div>
            <div class="item-content">
              <h4>
                <?= $post->title ?>
                <?php if ($post->private): ?>
                  <span>非公開</span>
                <?php endif; ?>
              </h4>
              <div class="item-body">
                <ul>
                  <li>
                    <h5>テキスト</h5>
                    <p><?= $post->text ?></p>
                  </li>
                  <li>
                    <h5>公開日時</h5>
                    <p>
                      <?= str_replace('前', '', $post->published_at->diffForHumans()); ?>
                      （<?= $post->published_at->format('Y年n月d日') ?>）
                    </p>
                  </li>
                </ul>
              </div>
            </div>
            <div class="item-buttons">
              <div>
                <a class="edit" href="/admin/posts/<?= $post->id ?>/edit"><span>編集</span></a>
              </div>
              <div>
                <a class="show <?php if ($post->private) echo "disabled"; ?>" href="/posts/<?= $post->id ?>" target="_blank">
                  <span>公開ページ</span>
                </a>
              </div>
              <div>
                <form action="/admin/posts/<?= $post->id ?>" method="post" onsubmit="return window.confirm('本当に削除しますか？');">
                  <input type="hidden" name="_method" value="DELETE">
                  <input class="delete" type="submit" value="削除">
                </form>
              </div>
            </div>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
</main>
<script src="../assets/script/clean_query.js" defer></script>
<script src="../assets/script/search.js" defer></script>

<?php require 'templates/admin/footer.php' ?>