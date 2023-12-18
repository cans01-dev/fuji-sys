<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>フジハウジング｜管理画面</title>
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
    ['<?php echo $toast_msg["type"] ?>']
    ('<?php echo $toast_msg["msg"] ?>');
  </script>
<?php endif; ?>
<header>
  <div class="header-logo">
    <a href="/admin/">
      <img src="/assets/img/logo.png" alt="">
    </a>
  </div>
  <div class="header-nav">
    <nav>
      <ul>
        <li><a href="/admin/mansions">マンション一覧</a></li>
        <li><a href="/admin/mansions/create">マンション新規登録</a></li>
      </ul>
    </nav>
  </div>
</header>