<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>フジハウジング｜管理画面</title>
    <link rel="shortcut icon" href="/assets/img/icon-admin.png" type="image/x-icon">
    <!-- css -->
    <link rel="stylesheet" href="/assets/css/admin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.css">
    <!-- script -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/toastr@2.1.4/toastr.min.js"></script>
<body>
<?php if ($toast_msg !== null): ?>
  <script>
    toastr.options.positionClass = 'toast-bottom-right';
    toastr
    ['<?= $toast_msg["type"] ?>']
    ('<?= $toast_msg["msg"] ?>');
  </script>
<?php endif; ?>
<header>
  <div class="header-logo">
    <a href="<?= url("/admin/mansions") ?>">
      <img src="/assets/img/logo.png" alt="">
    </a>
  </div>
  <div class="header-nav">
    <nav>
      <ul>
        <li><a href="<?= url("/") ?>" target="_blank">公開ページ</a></li>
        <li><a href="<?= url("/admin/mansions") ?>">マンション一覧</a></li>
        <li><a href="<?= url("/admin/mansions/create") ?>">マンション新規登録</a></li>
        <li><a href="<?= url("/admin/posts") ?>">投稿一覧</a></li>
        <li><a href="<?= url("/admin/posts/create") ?>">投稿新規作成</a></li>
        <?php if (isset($_SESSION["admin"])): ?>
        <li class="logout">
          <form action="/admin/logout" method="post">
            <button type="submit">ログアウト</button>
          </form>
        </li>
        <?php endif; ?>
      </ul>
    </nav>
  </div>
</header>