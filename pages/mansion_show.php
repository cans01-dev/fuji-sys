<?php require 'templates/header.php'; ?>
<main>
  <div class="subpage-h2">
    <div>
      <h2 class="section-h2"><span>I</span>nformation
        <div><span></span>
          <p>マンション情報</p>
        </div>
      </h2>
    </div>
  </div>
  <div class="breadcrumb">
    <div>
      <p>
        <a href="<?php echo url("./") ?>">TOP</a> 〉
        <a href="<?php echo url("./mansions") ?>">マンション検索</a> 〉
        <a href="<?php echo url("./mansions") ?>">マンション情報一覧</a> 〉
        <a href="<?php echo url("./mansions/{$mansion->id}") ?>"><?php echo $mansion->title ?></a>
      </p>
    </div>
  </div>
  <section class="mansion-info">
    <h3 class="section-h3"><?php echo $mansion->title ?></h3>
    <div class="flexbox">
      <div class="appraisal">
        <div>
          <h4>概算査定金額</h4>
          <p>
            <span class="tubotanka">坪単価</span>
            <span class="number"><?php echo $mansion->unit_price ?></span>
            <span class="unit">万円</span>
          </p>
        </div>
      </div>
      <div class="comment">
        <h4>担当者コメント</h4>
        <p><?php echo $mansion->get("comment", "ーーー") ?></p>
      </div>
    </div>
    <div class="mansion-detail">
      <dl>
        <div class="detail-row">
          <dt><span>所在地</span></dt>
          <dd><?php echo $mansion->address ?></dd>
        </div>
        <div class="detail-row">
          <dt><span>交通</span></dt>
          <dd><?php echo $mansion->access ?></dd>
        </div>
        <div class="detail-row">
          <dt><span>総戸数</span></dt>
          <dd class="half"><?php echo $mansion->get("total_units", "ーーー", "戸") ?></dd>
          <dt><span>築年数</span></dt>
          <dd class="half">
            <?php if ($mansion->birthday_set) : ?>
              <?php echo str_replace('前', '', $mansion->birthday->diffForHumans()); ?>
              （<?php echo $mansion->birthday->format('Y年n月') ?>）
            <?php else : ?>
              ーーー
            <?php endif; ?>
          </dd>
        </div>
        <div class="detail-row">
          <dt><span>階数</span></dt>
          <dd class="half"><?php echo $mansion->get("floors", "ーーー") ?></dd>
          <dt><span>建築構造</span></dt>
          <dd class="half"><?php echo $mansion->get("architecture", "ーーー") ?></dd>
        </div>
        <div class="detail-row">
          <dt><span>備考</span></dt>
          <dd><p><?php echo $mansion->get("note", "ーーー") ?></p></dd>
        </div>
      </dl>
    </div>
    <div class="mansion-gallery">
      <ul class="grid-list">
        <?php
        if ( strpos( $mansion->getImageUrl("image1"), 'no-image.png' ) === false ){
          echo '<li class="grid-item">';
          echo '<a href="' . $mansion->getImageUrl("image1") . '">';
          echo  '<img src="' . $mansion->getImageUrl("image1") . '" alt="">';
          echo '</a>';
          echo '</li>';
        }
        if ( strpos( $mansion->getImageUrl("image2"), 'no-image.png' ) === false ){
          echo '<li class="grid-item">';
          echo '<a href="' . $mansion->getImageUrl("image2") . '">';
          echo  '<img src="' . $mansion->getImageUrl("image2") . '" alt="">';
          echo '</a>';
          echo '</li>';
        }
        if ( strpos( $mansion->getImageUrl("image3"), 'no-image.png' ) === false ){
          echo '<li class="grid-item">';
          echo '<a href="' . $mansion->getImageUrl("image3") . '">';
          echo  '<img src="' . $mansion->getImageUrl("image3") . '" alt="">';
          echo '</a>';
          echo '</li>';
        }
        if ( strpos( $mansion->getImageUrl("image4"), 'no-image.png' ) === false ){
          echo '<li class="grid-item">';
          echo '<a href="' . $mansion->getImageUrl("image4") . '">';
          echo  '<img src="' . $mansion->getImageUrl("image4") . '" alt="">';
          echo '</a>';
          echo '</li>';
        }
        ?>
      </ul>
    </div>
  </section>

  <?php require 'templates/banner.php'; ?>

  <section class="mansion-policy">
    <h3 class="section-h3 policy">弊社の売却価格に関する考え方</h3>
    <div class="flexbox">
      <div>
        <h4>一般的な査定価格</h4>
        <img src="../assets/img/Group 273.png" alt="">
      </div>
      <div>
        <h4 class="our">弊社の特別査定価格</h4>
        <img src="../assets/img/Group 274.png" alt="">
      </div>
    </div>
  </section>

  <section class="mansion-support">
    <h3 class="section-h3">充実のサポート</h3>
    <ul class="flex-list">
      <li class="flex-item">
        <div class="item-head">
          <div>
            <h3>infomation<span>豊富な情報</span></h3>
          </div>
        </div>
        <div class="item-body">
          <p>私たちは中村区の不動産情報に関して、誰よりも豊富な知識を有している自信があります。これまでの実績やクライアントとの密接な連携を通じて、中村区の不動産市場のトレンドや動向に精通しています。</p>
        </div>
      </li>
      <li class="flex-item">
        <div class="item-head">
          <div>
            <h3>expensive<span>高額買取</span></h3>
          </div>
        </div>
        <div class="item-body">
          <p>私たちは不動産の高値売却に関して、非常に強力なネットワークと経験豊富な専門家チームを有しています。また、リノベーション事業より培ったノウハウを売主にご提供し、高値売却を可能にしています。</p>
        </div>
      </li>
      <li class="flex-item">
        <div class="item-head">
          <div>
            <h3>WARRANTY<span>売却保証</span></h3>
          </div>
        </div>
        <div class="item-body">
          <p>売却を開始されて一定期間成約に至らなかった場合に、事前にお約束した「売却金額」にて弊社が物件を買い取らせていただきます。売却時期が決まっている方におすすめです。</p>
        </div>
      </li>
    </ul>
  </section>

  <section class="mansion-flow">
    <h3 class="section-h3">売却の流れ</h3>
    <div class="flow-wrapper">
      <ul class="flex-list">
        <li class="flex-item">
          <div class="flow-icon">
            <img src="../assets/img/steps/Rectangle 93.png" alt="">
          </div>
          <div class="flow-content">
            <div class="flow-head"><span class="step">Step1</span>
              <h3>売却の相談</h3>
            </div>
            <p>人生の中で数少ない出来事である不動産売買を失敗しないためには、<br>ご売却に関するお客様のご要望やご不安をできるだけ詳しくお聞かせください。</p>
          </div>
        </li>
        <li class="flex-item">
          <div class="flow-icon">
            <img src="../assets/img/steps/Rectangle 94.png" alt="">
          </div>
          <div class="flow-content">
            <div class="flow-head"><span class="step">Step2</span>
              <h3>売却不動産の調査及び<br class="sp-br">販売方法の提案</h3>
            </div>
            <p>お客様からいただいた情報を元に不動産の調査を行い、最適な販売方法をご提案いたします。</p>
          </div>
        </li>
        <li class="flex-item">
          <div class="flow-icon">
            <img src="../assets/img/steps/Rectangle 95.png" alt="">
          </div>
          <div class="flow-content">
            <div class="flow-head"><span class="step">Step3</span>
              <h3>媒介契約締結</h3>
            </div>
            <p>正式に売却をご依頼される場合、当社とお客様で媒介契約を締結いたします。<br>これは売買の方法によって異なり、よりお客様に寄り添った内容となります。</p>
          </div>
        </li>
        <li class="flex-item">
          <div class="flow-icon">
            <img src="../assets/img/steps/Rectangle 96.png" alt="">
          </div>
          <div class="flow-content">
            <div class="flow-head"><span class="step">Step4</span>
              <h3>売却活動</h3>
            </div>
            <p>インターネットや折込広告など、様々な手段で購入希望者を募ります。<br>ご売却される不動産に合わせて、確実な売却を実現いたします。</p>
          </div>
        </li>
        <li class="flex-item">
          <div class="flow-icon">
            <img src="../assets/img/steps/Rectangle 97.png" alt="">
          </div>
          <div class="flow-content">
            <div class="flow-head"><span class="step">Step5</span>
              <h3>売買契約</h3>
            </div>
            <p>買主様との間で売買契約書を締結いたします。<br>売主様と買主様の双方が契約内容を十分に理解し、納得できるよう、契約締結をお手伝いいたします。</p>
          </div>
        </li>
        <li class="flex-item">
          <div class="flow-icon">
            <img src="../assets/img/steps/Rectangle 98.png" alt="">
          </div>
          <div class="flow-content">
            <div class="flow-head"><span class="step">Step6</span>
              <h3>決済、引き渡し</h3>
            </div>
            <p>引き渡し前までに行う手続きや引っ越しなど、細やかにサポートさせていただきます。<br>必要な支払いを済ませ買主様に鍵をお渡しすれば引き渡しは完了です。</p>
          </div>
        </li>
      </ul>
    </div>
  </section>

  <?php require 'templates/banner.php'; ?>

  <section class="mansion-around">
    <h3 class="section-h3">周辺マンション情報</h3>
    <div class="around-aligncenter">
      <div class="around-wrapper">
        <p>中村区の他のマンションから探す</p>
        <ul class="flex-list">
          <?php foreach ($mansions as $mansion) : ?>
            <li class="flex-item">
            <a href="./<?php echo $mansion->id ?>">
              <img src="<?php echo $mansion->getImageUrl("image1") ?>" alt="">
              <p><?php echo $mansion->title ?></p>
          </a>
            </li>
          <?php endforeach; ?>
        </ul>
        <div class="viewmore">
          <a href="/mansions">view more</a>
        </div>
      </div>
    </div>
  </section>

  <?php require 'templates/contact.php'; ?>

  <?php require 'templates/line.php'; ?>
</main>

<?php require 'templates/footer.php'; ?>