<?php require 'templates/header.php'; ?>
<main>
  <div class="subpage-h2">
    <div class="noborder">
      <h2 class="section-h2"><span>S</span>earch
        <div><span></span><p>検索結果一覧</p></div>
      </h2>
    </div>
  </div>

  <div class="search-bg">
    <section class="search">
      <?php require './templates/parts/search_form.php'; ?>
    </section>
  </div>

  <div class="breadcrumb">
    <div class="border">
      <p>
        <a href="">TOP</a> 〉
        <a href="">マンション検索</a> 〉
        <a href="">マンション情報一覧</a>
      </p>
    </div>
  </div>

  <div class="search-result">
    <h3><?php echo $address ?? $freeword ?? '中村区' ?> の検索結果一覧</h3>
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
      <ul class="grid-list">
        <?php foreach ($mansions as $mansion): ?>
          <li class="grid-item">
            <a href="./mansions/<?php echo $mansion->id ?>">
              <img src="<?php echo $mansion->getImageUrl("image1") ?>" alt="">
              <div>
                <p><?php echo $mansion->title ?></p>
              </div>
            </a>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
    <div class="search-option buttom">
      <p class=""><?php echo $pgnt_stmt ?></p>
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
    <div class="re-search">
      <a href="/mansions"><span>条件を変更して再検索</span></a>
    </div>
  </div>

  <?php require 'templates/line.php'; ?>
</main>
<script src="../assets/script/clean_query.js" defer></script>
<script src="../assets/script/search.js" defer></script>

<?php require 'templates/footer.php'; ?>