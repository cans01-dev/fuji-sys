<?php require 'templates/admin/header.php' ?>

<main>
  <div class="subpage-h2">
    <div>
      <h2 class="section-h2"><var>マンション新規登録</var>
        <div><span></span><p>create</p></div>
      </h2>
    </div>
  </div>
  <div class="admin-mansions-edit">
    <div class="back-to-index">
      <a href="<?php echo url("/admin/mansions") ?>">← マンション一覧に戻る</a>
    </div>
    <div class="mansion-stmt">
      <p>
        <span>新規登録</span>
      </p>
    </div>
    <form action="/admin/mansions" method="post">
      <?php require 'templates/admin/parts/mansion_form.php' ?>
      <div class="admin-mansion-footer">
        <button class="create" type="button" onclick="createOnClick()"><span>新規登録</span></button>
      </div>
    </form>
  </div>
</main>
<script defer>
  const input = document.getElementById('mansionTitle');
  function createOnClick() {
    if (window.confirm(input.value + 'を作成しますか？')) {
      document.forms[0].submit();
    }
  }
</script>

<?php require 'templates/admin/footer.php' ?>