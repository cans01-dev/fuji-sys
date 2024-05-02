<?php if (isset($err_meg)): ?>
  <div class="err_msg">
    <ul>
      <?php foreach ($err_meg as $e): ?>
        <li><?= $e[0] ?></li>
      <?php endforeach; ?>
    </ul>
  </div>
<?php endif; ?>
<!-- 上はサーバー側バリデーション、下はクライアント側バリデーション -->
<div class="err_msg" style="display: none;">
  <ul>
    
  </ul>
</div>
<div class="admin-mansion-form">
  <div class="field-item w-full img">
    <div class="item-body">
      <ul>
        <li>
          <div class="img-wrapper">
            <img src="<?= $post->getImageUrl('image') ?>" alt="" id="preview1">
          </div>
          <div class="img-controller">
            <label for="mansionImg1">変更</label>
            <input type="file" name="image" accept="image/*" id="mansionImg1" onchange="previewImage(this, 1)">
            <button type="button" onclick="imageClear(1)">削除</button>
            <input type="hidden" name="imageClear" id="imageClear">
          </div>
        </li>
        <li></li>
        <li></li>
        <li></li>
      </ul>
    </div>
  </div>
  <div class="field-item">
    <div class="item-head"><label for="">タイトル<span>必須</span></label></div>
    <div class="item-body">
      <input type="text" name="title" value="<?= $post->title ?>" id="mansionTitle" required>
    </div>
  </div>
  <div class="flexbox">
    <div class="field-item">
      <div class="item-head">
        <label for="">公開日</label>
        <div>
          <span>未設定: </span>
          <input type="hidden" name="published_at" value="1">
          <input type="checkbox" name="published_at" id="checkboxBirthday" value="0" <?= $post->published_at ? "" : "checked" ; ?>>
        </div>
      </div>
      <div class="item-body">
        <input type="date" name="published_at" value="<?= $post->published_at->format("Y-m-d") ?>" id="inputBirthday">
      </div>
    </div>
  </div> 
  <div class="field-item w-full">
    <div class="item-head"><label for="">本文</label></div>
    <div class="item-body"><textarea name="text"><?= $post->text ?></textarea></div>
  </div>
  <div class="field-item w-full">
    <div class="item-head"><label for="">公開状況</label></div>
    <div class="item-body private">
      <p><input type="radio" name="private" value="0" <?= $post->private === 0 ? "checked" : "" ; ?>><span>公開</span></p>
      <p><input type="radio" name="private" value="1" <?= $post->private === 1 ? "checked" : "" ; ?>><span>非公開</span></p>
    </div>
  </div>
</div>
<script defer>
  const checkboxBirthday = document.getElementById('checkboxBirthday');
  const inputBirthday = document.getElementById('inputBirthday');
  const mansionImg = document.getElementById('mansionImg');

  function birthdayInit() {
    if (checkboxBirthday.checked) {
      inputBirthday.classList.add("disabled");
    } else {
      inputBirthday.classList.remove("disabled");
    }
  }

  function previewImage(obj, id) {
    var fileReader = new FileReader();
    fileReader.onload = (function() {
      document.getElementById('preview' + id).src = fileReader.result;
    });
    fileReader.readAsDataURL(obj.files[0]);
  }

  function imageClear(id) {
    var obj = document.getElementById("mansionImg" + id);
    obj.value = "";
    document.getElementById('preview' + id).src = "/assets/img/no-image.png";
    document.getElementById('imageClear' + id).value = 1;
  }

  function validate() {
    let err = [];
    if (document.getElementById('mansionTitle').value === "") {
      err.push("タイトルは必須項目です");
    }
    return err;
  }

  function submitOnClick(confirm=false) {
    let validation = validate();
    if (validation.length > 0) {
      window.scroll({top: 0, behavior: 'smooth'});
      document.querySelector('.err_msg').style.display = 'block';
      document.querySelector('.err_msg ul').innerHTML = '';
      validation.forEach(value => {
        let element = document.createElement('li');
        element.textContent = value;
        document.querySelector('.err_msg ul').appendChild(element);
      });
    } else {
      if (confirm) {
        const input = document.getElementById('mansionTitle');
        if (window.confirm(input.value + 'を作成しますか？')) {
          document.forms[1].submit();
        }
      } else {
        document.forms[1].submit();
      }
    }
  }

  birthdayInit();

  checkboxBirthday.addEventListener('change', function() {
    birthdayInit();
  });

</script>

