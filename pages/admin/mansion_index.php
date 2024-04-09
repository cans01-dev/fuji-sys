<?php require 'templates/admin/header.php' ?>

<main>
  <div class="subpage-h2">
    <div>
      <h2 class="section-h2">マンション一覧
        <div><span></span><p>mansions</p></div>
      </h2>
    </div>
  </div>
  <div class="admin-mansions">
    <div class="search-form">
      <form action="/admin/mansions" name="searchForm" id="searchForm">
        <div class="flexbox">
          <div class="address">
            <label for="">名古屋市中村区</label>
            <input type="text" name="address" placeholder="以降の住所" value="<?php echo $_GET["address"] ?? "" ?>">
          </div>
          <div class="freeword">
            <input type="text" name="freeword" placeholder="フリーワード" value="<?php echo $_GET["freeword"] ?? "" ?>">
          </div>
          <div class="search-submit">
            <button type="submit" id="searchFormSubmit"><span>検索</span></button>
          </div>
        </div>
      </form>
    </div>
    <div class="search-option">
      <p class=""><?php echo $pgnt_stmt ?></p>
      <div class="flexbox">
        <div>
          <label for="">表示件数</label>
          <div class="select-wrapper">
            <select name="limit" class="searchLimit" id="searchLimit" form="searchForm">
              <option value="20">20件</option>
              <option value="40">40件</option>
              <option value="60">60件</option>
            </select>
          </div>
        </div>
        <div>
          <label for="">並び順</label>
          <div class="select-wrapper">
            <select name="order" class="searchOrder" id="searchOrder" form="searchForm">
              <option value="latest">新着順</option>
              <option value="price">価格の安い順</option>
              <option value="price-desc">価格の高い順</option>
            </select>
          </div>
        </div>
      </div>
    </div>
    <div class="search-results">
      <ul class="mansion-list">
        <?php foreach ($mansions as $mansion): ?>
          <li class="mansion-item">
            <div class="item-icon">
              <img src="<?php echo $mansion->getImageUrl("image1") ?>" alt="">
            </div>
            <div class="item-content">
              <h4>
                <?php echo $mansion->title ?>
                <?php if ($mansion->private): ?>
                  <span>非公開</span>
                <?php endif; ?>
              </h4>
              <div class="item-body">
                <ul>
                  <li>
                    <h5>査定金額</h5>
                    <p><?php echo $mansion->unit_price."万/坪" ?></p>
                  </li>
                  <li>
                    <h5>所在地</h5>
                    <p><?php echo $mansion->address ?></p>
                  </li>
                  <li>
                    <h5>交通</h5>
                    <p><?php echo $mansion->access ?></p>
                  </li>
                  <li>
                    <h5>総戸数</h5>
                    <p><?php echo $mansion->get("total_units", "ーーー", "戸") ?></p>
                  </li>
                  <li>
                    <h5>築年数</h5>
                    <p>
                    <?php if ($mansion->birthday_set): ?>
                      <?php echo str_replace('前', '', $mansion->birthday->diffForHumans()); ?>
                      （<?php echo $mansion->birthday->format('Y年n月') ?>）
                    <?php else: ?>
                      ーーー
                    <?php endif; ?>
                    </p>
                  </li>
                  <li>
                    <h5>階数</h5>
                    <p><?php echo $mansion->get("floors", "ーーー") ?></p>
                  </li>
                  <li>
                    <h5>建築構造</h5>
                    <p><?php echo $mansion->get("architecture", "ーーー") ?></p>
                  </li>
                </ul>
              </div>
            </div>
            <div class="item-buttons">
              <div>
                <a class="edit" href="./mansions/<?php echo $mansion->id ?>/edit"><span>編集</span></a>
              </div>
              <div>
                <a class="show <?php if ($mansion->private) echo "disabled"; ?>" href="../mansions/<?php echo $mansion->id ?>" target="_blank">
                  <span>公開ページ</span>
                </a>
              </div>
              <div>
                <form action="/mansions/<?php echo $mansion->id ?>" method="post" onsubmit="return window.confirm('本当に削除しますか？');">
                  <input type="hidden" name="_method" value="DELETE">
                  <input class="delete" type="submit" value="削除">
                </form>
              </div>
            </div>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
    <div class="search-pagenation">
      <ul class="flex-list">
        <?php if ($pgnt["first"]): ?>
          <li class="flex-item">
            <a href="<?php echo url_param_change(['page' => $pgnt["first"]]); ?>">
              <img src="../assets/img/arrow-left.png" alt="">
            </a>
          </li>
        <?php endif; ?>
        <?php if ($pgnt["prev"]): ?>
          <li class="flex-item">
            <a href="<?php echo url_param_change(['page' => $pgnt["prev"]]); ?>">
              <span><?php echo $pgnt["prev"] ?></span>
            </a>
          </li>
        <?php endif; ?>
        <?php if ($pgnt["current"]): ?>
          <li class="flex-item">
            <a class="active" href="<?php echo url_param_change(['page' => $pgnt["current"]]); ?>">
              <span><?php echo $pgnt["current"] ?></span>
            </a>
          </li>
        <?php endif; ?>
        <?php if ($pgnt["next"]): ?>
          <li class="flex-item">
            <a href="<?php echo url_param_change(['page' => $pgnt["next"]]); ?>">
              <span><?php echo $pgnt["next"] ?></span>
            </a>
          </li>
        <?php endif; ?>
        <?php if ($pgnt["last"]): ?>
          <li class="flex-item">
            <a href="<?php echo url_param_change(['page' => $pgnt["last"]]); ?>">
              <img src="../assets/img/arrow-right.png" alt="">
            </a>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</main>
<script src="../assets/script/clean_query.js" defer></script>
<script src="../assets/script/search.js" defer></script>

<?php require 'templates/admin/footer.php' ?>