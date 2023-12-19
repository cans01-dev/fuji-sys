<?php require 'templates/admin/header.php'; ?>
<main>
  <div class="login">
    <div>
      <img src="/assets/img/icon.png" alt="">
    </div>
    <div>
      <div class="subpage-h2">
        <div>
          <h2 class="section-h2">ログイン
            <div><span></span><p>login</p></div>
          </h2>
        </div>
      </div>
      <form action="/admin/login" method="post">
        <div>
          <label for="">パスワード</label>
          <input type="password" name="password">
        </div>
        <div class="submit">
          <input type="submit" value="ログイン">
        </div>
      </form>
    </div>
  </div>

</main>

<?php require 'templates/admin/footer.php'; ?>