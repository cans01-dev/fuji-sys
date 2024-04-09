<?php require 'templates/header.php'; ?>
<main>
  <div class="mainvisual-bg">
    <div class="mainvisual">
      <p class="mainvisual-catchcopy">名古屋市中村区の<br class="sp-br">中古マンション特化型</p>
      <h1>不動産販売の<br class="sp-br">精鋭集団<br><span>We're Professional</span></h1>
      <div class="flexbox">
        <div class="our-mission">
          <span>Our Mission</span>
        </div>
        <div class="mainvisual-content">
          <h3>中村区の<br class="tb-br">分譲マンションの売却情報が<br class="sp-br">すぐにわかる</h3>
          <p>私たちは名古屋市中村区の分譲マンションに特化した不動産販売精鋭集団です。<br>
          厳選されたエキスパートたちが一堂に会し、プロ精神と情熱をもって、お客様の不動産売却のお手伝いをいたします。<br>
          お悩み中でも大歓迎です。どんな些細なご相談でもお気軽にお知らせください。</p>
          <div class="mainvisual-contact">
            <a href="/contact"><span>Contact</span></a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php require 'templates/search.php'; ?>

  <section id="about" class="about">
    <div class="about-icon">
      <img src="../assets/img/icon.png" alt="">
    </div>
    <h2 class="section-h2">Apartment<br>in <span><i>Nakamura</i></span> Ward</h2>
    <div class="flexbox">
      <div class="about-content">
        <h3><span>中村区</span>の<br class="sp-br">マンションのことなら</h3>
        <p>中村区にエリアを絞っているからこそ、私たちには他の会社にはない強みがあります。専門性の向上や進捗管理のしやすさから、お客様一人ひとりに寄り添ったご案内が可能です。<br>この強みは、お客様にとってより深い関係性と信頼感を築く一方で、弊社自体の成長とブランドの差別化にも寄与します。</p>
        <div class="about-contact">
          <a href="/contact"><p><span>Contact</span><img src="../assets/img/arrow.png" alt=""></p></a>
        </div>
      </div>
      <div class="about-img">
        <img src="../assets/img/mansion1.jpg" alt="">
      </div>
    </div>
  </section>

  <section class="support">
    <h2 class="section-h2"><span>S</span>upport
      <div><span></span><p>充実のサポート</p></div>
    </h2>
    <ul class="flex-list">
      <li class="flex-item">
        <div class="item-head">
          <h3>infomation<span>豊富な情報</span></h3>
        </div>
        <div class="item-body">
          <p>私たちは中村区の不動産情報に関して、誰よりも豊富な知識を有している自信があります。中村区は独自の特性や魅力を持つエリアであり、地域の不動産市場において綿密な調査と経験を積んできました。これまでの実績やクライアントとの密接な連携を通じて、中村区の不動産市場のトレンドや動向に精通しています。</p>
        </div>
      </li>
      <li class="flex-item">
        <div class="item-head">
          <h3>expensive<span>高額買取</span></h3>
        </div>
        <div class="item-body">
          <p>私たちは不動産の高額買取に関して、非常に強力なネットワークと経験豊富な専門家チームを有しています。お客様が満足いく取引を実現するために、市場の動向や詳細な査定プロセスにおいて深い理解を持っています。私たちはお客様とのコミュニケーションを大切にしながら、安心して不動産の売却を進めるお手伝いをいたします。</p>
        </div>
      </li>
      <li class="flex-item">
        <div class="item-head">
          <h3>WARRANTY<span>売却保証</span></h3>
        </div>
        <div class="item-body">
          <p>売却を開始されて一定期間成約に至らなかった場合に、事前にお約束した「売却金額」にて弊社が物件を買い取らせていただきます。査定価格は市場よりやや低くなりますが、迅速かつ確実に売却できます。売却時期が決まっている方におすすめです。</p>
        </div>
      </li>
    </ul>
  </section>

  <section id="example" class="example">
    <h2 class="section-h2">Property<br><span>E</span>xample
      <div><span></span><p>物件事例</p></div>
    </h2>
    <ul class="grid-list">
      <?php foreach ($mansions as $mansion): ?>
        <li class="grid-item">
          <img src="<?php echo $mansion->getImageUrl("image1") ?>" alt="">
          <a href="<?php echo url("/mansions/{$mansion->id}") ?>">More</a>
        </li>
      <?php endforeach; ?>
    </ul>
    <div class="viewallarchives">
      <a href="<?php echo url("/mansions") ?>"><span>View All Archives</span></a>
    </div>
  </section>

  <?php require 'templates/search.php'; ?>

  <section id="flow" class="flow">
    <h2 class="section-h2"><span>F</span>low
      <div><span></span><p>売却までの流れ</p></div>
    </h2>
    <ul class="grid-list">
      <li class="grid-item">
        <div class="icon">
          <img src="../assets/img/steps/Rectangle 93.png" alt="">
        </div>
        <span class="step">Step1</span>
        <h3>売却の相談</h3>
        <p>人生の中で数少ない出来事である不動産売買を失敗しないためには、ご売却に関するお客様のご要望やご不安をできるだけ詳しくお聞かせください。</p>
      </li>
      <li class="grid-item">
        <div class="icon">
          <img src="../assets/img/steps/Rectangle 94.png" alt="">
        </div>
        <span class="step">Step2</span>
        <h3>売却不動産の調査及び<br>販売方法の提案</h3>
        <p>お客様からいただいた情報を元に不動産の調査を行い、最適な販売方法をご提案いたします。</p>
      </li>
      <li class="grid-item">
        <div class="icon">
          <img src="../assets/img/steps/Rectangle 95.png" alt="">
        </div>
        <span class="step">Step3</span>
        <h3>媒介契約締結</h3>
        <p>正式に売却をご依頼される場合、当社とお客様で媒介契約を締結いたします。これは売買の方法によって異なり、よりお客様に寄り添った内容となります。</p>
      </li>
      <li class="grid-item">
        <div class="icon">
          <img src="../assets/img/steps/Rectangle 96.png" alt="">
        </div>
        <span class="step">Step4</span>
        <h3>売却活動</h3>
        <p>インターネットや折込広告など、様々な手段で購入希望者を募ります。ご売却される不動産に合わせて、確実な売却を実現いたします。</p>
      </li>
      <li class="grid-item">
        <div class="icon">
          <img src="../assets/img/steps/Rectangle 97.png" alt="">
        </div>
        <span class="step">Step5</span>
        <h3>売買契約</h3>
        <p>買主様との間で売買契約書を締結いたします。売主様と買主様の双方が契約内容を十分に理解し、納得できるよう、契約締結をお手伝いいたします。</p>
      </li>
      <li class="grid-item">
        <div class="icon">
          <img src="../assets/img/steps/Rectangle 98.png" alt="">
        </div>
        <span class="step">Step6</span>
        <h3>決済、引き渡し</h3>
        <p>引き渡し前までに行う手続きや引っ越しなど、細やかにサポートさせていただきます。必要な支払いを済ませ買主様に鍵をお渡しすれば引き渡しは完了です。</p>
      </li>
    </ul>
  </section>

  <?php require 'templates/search.php'; ?>

  <section id="faq" class="faq">
    <h2 class="section-h2"><span>F</span>AQ
      <div><span></span><p>よくある質問</p></div>
    </h2>
    <ul class="flex-list">
    <li class="flex-item">
        <div class="flexbox">
          <div class="faq-head">
            <div class="faq-icon question"><span>Q</span></div>
          </div>
          <div class="faq-body">
            <p class="question">査定依頼をしたら、売らないといけないのでしょうか？</p>
          </div>
        </div>
        <div class="flexbox">
          <div class="faq-head">
            <div class="faq-icon answer"><span>A</span></div>
          </div>
          <div class="faq-body">
            <p>いえ、ご提案した売却価格を元にご検討ください。</p>
          </div>
        </div>
      </li>
      <li class="flex-item">
        <div class="flexbox">
          <div class="faq-head">
            <div class="faq-icon question"><span>Q</span></div>
          </div>
          <div class="faq-body">
            <p class="question">どのような物件が買取の対象となりますか？</p>
          </div>
        </div>
        <div class="flexbox">
          <div class="faq-head">
            <div class="faq-icon answer"><span>A</span></div>
          </div>
          <div class="faq-body">
            <p>分譲マンションが対象となります。<br>その他の物件も売却可能な場合がありますので、お気軽にご相談ください。</p>
          </div>
        </div>
      </li>
      <li class="flex-item">
        <div class="flexbox">
          <div class="faq-head">
            <div class="faq-icon question"><span>Q</span></div>
          </div>
          <div class="faq-body">
            <p class="question">エリアは決まっていますか？</p>
          </div>
        </div>
        <div class="flexbox">
          <div class="faq-head">
            <div class="faq-icon answer"><span>A</span></div>
          </div>
          <div class="faq-body">
            <p>中村区の不動産を専門に取り扱っております。<br>中村区の不動産情報に関して、誰よりも豊富な知識を有している自信がありますのでお気軽にご相談ください。</p>
          </div>
        </div>
      </li>
    <li class="flex-item">
        <div class="flexbox">
          <div class="faq-head">
            <div class="faq-icon question"><span>Q</span></div>
          </div>
          <div class="faq-body">
            <p class="question">現在居住中なのですが、売却が決まるとすぐに引っ越さなければなりませんか？</p>
          </div>
        </div>
        <div class="flexbox">
          <div class="faq-head">
            <div class="faq-icon answer"><span>A</span></div>
          </div>
          <div class="faq-body">
            <p>お引渡の日については、お客様のご都合に合わせ調整いたしますので、ご安心ください。</p>
          </div>
        </div>
      </li>
    <li class="flex-item">
        <div class="flexbox">
          <div class="faq-head">
            <div class="faq-icon question"><span>Q</span></div>
          </div>
          <div class="faq-body">
            <p class="question">遠方に住んでおり、何度も足を運ぶことができません。</p>
          </div>
        </div>
        <div class="flexbox">
          <div class="faq-head">
            <div class="faq-icon answer"><span>A</span></div>
          </div>
          <div class="faq-body">
            <p>最低一度はお越しいただくことになりますが、何度もお越しいただく必要はありませんので、ご安心ください。</p>
          </div>
        </div>
      </li>
    </ul>
    <!-- <div class="viewmore">
      <a href=""><span>View More</span></a>
    </div> -->
  </section>

  <?php require 'templates/search.php'; ?>

  <?php require 'templates/contact.php'; ?>

  <?php require 'templates/line.php'; ?>
</main>
<?php require 'templates/footer.php'; ?>