<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo getPageTitle(); ?>｜名古屋市中村区専門の分譲マンション査定サイト</title>
  <meta name="description" content="名古屋市中村区の分譲マンションを簡易査定します。中村区にエリアを絞っているからこそ、詳細な査定が可能です。専門性の向上や進捗管理のしやすさから、お客様一人ひとりに寄り添ったご案内をさせていただきます。">
  <link rel="shortcut icon" href="/assets/img/favicon.ico" type="image/x-icon" />
  <link rel="apple-touch-icon" href="/assets/img/apple-touch-icon.png" />
  <link rel="apple-touch-icon" sizes="57x57" href="/assets/img/apple-touch-icon-57x57.png" />
  <link rel="apple-touch-icon" sizes="72x72" href="/assets/img/apple-touch-icon-72x72.png" />
  <link rel="apple-touch-icon" sizes="76x76" href="/assets/img/apple-touch-icon-76x76.png" />
  <link rel="apple-touch-icon" sizes="114x114" href="/assets/img/apple-touch-icon-114x114.png" />
  <link rel="apple-touch-icon" sizes="120x120" href="/assets/img/apple-touch-icon-120x120.png" />
  <link rel="apple-touch-icon" sizes="144x144" href="/assets/img/apple-touch-icon-144x144.png" />
  <link rel="apple-touch-icon" sizes="152x152" href="/assets/img/apple-touch-icon-152x152.png" />
  <link rel="apple-touch-icon" sizes="180x180" href="/assets/img/apple-touch-icon-180x180.png" />
  <!-- css -->
  <link rel="stylesheet" href="/assets/css/style.css">
  <!-- script -->
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-T0QRPRY77X"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-T0QRPRY77X');
  </script>
</head>

<body>
  <header>
    <div class="flexbox">
      <div class="flexbox-logo">
        <a href="/"><img src="../assets/img/logo.png" alt=""></a>
      </div>
      <div class="flexbox-nav">
        <nav>
          <ul>
            <li><a href="/mansions">マンション検索</a></li>
            <li><a href="/mansions">マンション一覧</a></li>
            <li><a href="/#flow">売却の流れ</a></li>
            <li><a href="/#faq">よくある質問</a></li>
          </ul>
        </nav>
        <div class="header-contact">
          <a href="/contact"><span>お問い合わせ</span></a>
        </div>
      </div>
      <div class="toggle-button-sp">
        <div class="hamburger">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
    </div>
  </header>
  <div class="header-menu">
    <div class="menu">
      <ul class="menu__parent-list">
        <li><a href="/mansions">マンション検索</a></li>
        <li><a href="/mansions">マンション一覧</a></li>
        <li><a href="/#flow">売却の流れ</a></li>
        <li><a href="/#faq">よくある質問</a></li>
      </ul>
    </div>
  </div>
  <script>
    $(function() {
      // ハンバーガーメニュー
      $(".toggle-button-sp").on("click", function() {
        $(this).toggleClass("open");
        $(".header-menu").toggleClass("open");
        $(".logo").toggleClass("open");
      });
    });
  </script>