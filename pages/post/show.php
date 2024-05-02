<?php require 'templates/header.php'; ?>
<main>
  <div class="breadcrumb" style="max-width: 1140px; margin-inline: auto;">
    <div>
      <p>
        <a href="/">TOP</a> 〉
        <a href="/posts">NEWS</a> 〉
        <a href="/posts/<?= $post->id ?>"><?= $post->title ?></a>
      </p>
    </div>
  </div>
  <section class="mansion-info" style="max-width: 1140px; margin-inline: auto;">
    <h3 class="section-h3"><?= $post->title ?></h3>
    <div class="flexbox">
      <img src="<?= $post->getImageUrl("image") ?>" alt="" style="aspect-ratio: 16/9; object-fit: cover;">
    </div>
    <div class="mansion-detail">
      <p class="post-content">
        <?= $post->text ?>
      </p>
    </div>
  </section>

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
          <?php foreach ($posts as $post) : ?>
            <li class="flex-item">
            <a href="./<?= $post->id ?>">
              <img src="<?= $post->getImageUrl("image1") ?>" alt="">
              <p><?= $post->title ?></p>
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