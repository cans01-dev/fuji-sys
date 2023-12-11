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
      <div class="search-form">
        <form action="">
          <div class="flexbox">
            <div class="address">
              <label for="">名古屋市中村区</label>
              <input type="text" placeholder="以降の住所">
            </div>
            <div class="freeword">
              <input type="text" placeholder="フリーワード">
            </div>
          </div>
          <div class="search-submit">
            <button type="submit"><span>無料で査定結果に進む</span></button>
          </div>
        </form>
      </div>
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
    <h3>中村区 の検索結果一覧</h3>
    <div class="search-option">
      <p class="">0件中0～0件を表示</p>
      <div class="flexbox">
        <div>
          <label for="">表示件数</label>
          <div class="select-wrapper">
            <select name="">
              <option value="20">20件</option>
              <option value="20">40件</option>
              <option value="20">60件</option>
            </select>
          </div>
        </div>
        <div>
          <label for="">並び順</label>
          <div class="select-wrapper">
            <select name="">
              <option value="20">おすすめ順</option>
              <option value="20">価格の安い順</option>
              <option value="20">価格の高い順</option>
            </select>
          </div>
        </div>
      </div>
    </div>
    <div class="search-results">
      <ul class="grid-list">
        <li class="grid-item">
          <img src="../assets/img/Rectangle 140.png" alt="">
          <div>
            <p>マンション名マンション名マンション名</p>
          </div>
        </li>
        <li class="grid-item">
          <img src="../assets/img/Rectangle 140.png" alt="">
          <div>
            <p>マンション名マンション名マンション名</p>
          </div>
        </li>
        <li class="grid-item">
          <img src="../assets/img/Rectangle 140.png" alt="">
          <div>
            <p>マンション名マンション名マンション名</p>
          </div>
        </li>
        <li class="grid-item">
          <img src="../assets/img/Rectangle 140.png" alt="">
          <div>
            <p>マンション名マンション名マンション名</p>
          </div>
        </li>
      </ul>
    </div>
    <div class="search-option buttom">
      <p class="">0件中0～0件を表示</p>
      <div class="flexbox">
        <div>
          <label for="">表示件数</label>
          <div class="select-wrapper">
            <select name="">
              <option value="20">20件</option>
              <option value="20">40件</option>
              <option value="20">60件</option>
            </select>
          </div>
        </div>
        <div>
          <label for="">並び順</label>
          <div class="select-wrapper">
            <select name="">
              <option value="20">おすすめ順</option>
              <option value="20">価格の安い順</option>
              <option value="20">価格の高い順</option>
            </select>
          </div>
        </div>
      </div>
    </div>
    <div class="search-pagenation">
      <ul class="flex-list">
        <li class="flex-item">
          <a href=""><img src="../assets/img/arrow-left.png" alt=""></a>
        </li>
        <li class="flex-item">
          <a href=""><span>1</span></a>
        </li>
        <li class="flex-item">
          <a href="" class="active"><span>2</span></a>
        </li>
        <li class="flex-item">
          <a href=""><span>3</span></a>
        </li>
        <li class="flex-item">
          <a href=""><img src="../assets/img/arrow-right.png" alt=""></a>
        </li>
      </ul>
    </div>
    <div class="re-search">
      <button><span>条件を変更して再検索</span></button>
    </div>
  </div>

  <?php require 'templates/line.php'; ?>
</main>

<?php require 'templates/footer.php'; ?>