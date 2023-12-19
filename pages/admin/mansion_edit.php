<?php require 'templates/admin/header.php' ?>

<main>
  <div class="subpage-h2">
    <div>
      <h2 class="section-h2"><var><?php echo $mansion->title ?></var>
        <div><span></span><p>edit</p></div>
      </h2>
    </div>
  </div>
  <div class="admin-mansions-edit">
    <div class="back-to-index">
      <a href="<?php echo url("/admin/mansions") ?>">← マンション一覧に戻る</a>
    </div>
    <div class="mansion-stmt">
      <p>
        <span>作成日: </span>
        <?php echo $mansion->created_at->format("Y n/d H:i:s"). " | " . $mansion->created_at->diffForHumans() ?>
        <span>マンションID: </span>
        <?php echo $mansion->id ?>
        <span>公開URL: </span>
        <a href="<?php echo url("/mansions/{$mansion->id}") ?>" target="_blank">
          <?php echo url("/mansions/{$mansion->id}") ?>
        </a>
      </p>
    </div>
    <form action="/admin/mansions/<?php echo $mansion->id ?>" method="post" enctype="multipart/form-data">
      <?php require 'templates/admin/parts/mansion_form.php' ?>
      <div class="admin-mansion-footer">
        <input type="hidden" name="_method" value="PUT">
        <button type="button" onclick="submitOnClick()"><span>更新</span></button>
      </div>
    </form>
  </div>
</main>
<script defer>
  const h2 = document.querySelector('.section-h2 var');
  const input = document.getElementById('mansionTitle');
  input.addEventListener('input', function(e) {
    h2.textContent = e.target.value;
  });
</script>

<?php require 'templates/admin/footer.php' ?>