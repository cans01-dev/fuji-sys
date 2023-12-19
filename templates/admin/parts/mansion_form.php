<?php if (isset($err_meg)): ?>
  <div class="err_msg">
    <ul>
      <?php foreach ($err_meg as $e): ?>
        <li><?php echo $e[0] ?></li>
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
            <img src="<?php echo $mansion->getImageUrl('image1') ?>" alt="" id="preview1">
          </div>
          <div class="img-controller">
            <label for="mansionImg1">変更</label>
            <input type="file" name="image1" accept="image/*" id="mansionImg1" onchange="previewImage(this, 1)">
            <button type="button" onclick="imageClear(1)">削除</button>
            <input type="hidden" name="imageClear1" id="imageClear1">
          </div>
        </li>
        <li>
          <div class="img-wrapper">
            <img src="<?php echo $mansion->getImageUrl('image2') ?>" alt="" id="preview2">
          </div>
          <div class="img-controller">
            <label for="mansionImg2">変更</label>
            <input type="file" name="image2" accept="image/*" id="mansionImg2" onchange="previewImage(this, 2)">
            <button type="button" onclick="imageClear(2)">削除</button>
            <input type="hidden" name="imageClear2" id="imageClear2">
          </div>
        </li>
        <li>
          <div class="img-wrapper">
            <img src="<?php echo $mansion->getImageUrl('image3') ?>" alt="" id="preview3">
          </div>
          <div class="img-controller">
            <label for="mansionImg3">変更</label>
            <input type="file" name="image3" accept="image/*" id="mansionImg3" onchange="previewImage(this, 3)">
            <button type="button" onclick="imageClear(3)">削除</button>
            <input type="hidden" name="imageClear3" id="imageClear3">
          </div>
        </li>
        <li>
          <div class="img-wrapper">
            <img src="<?php echo $mansion->getImageUrl('image4') ?>" alt="" id="preview4">
          </div>
          <div class="img-controller">
            <label for="mansionImg4">変更</label>
            <input type="file" name="image4" accept="image/*" id="mansionImg4" onchange="previewImage(this, 4)">
            <button type="button" onclick="imageClear(4)">削除</button>
            <input type="hidden" name="imageClear4" id="imageClear4">
          </div>
        </li>
      </ul>
    </div>
  </div>
  <div class="field-item">
    <div class="item-head"><label for="">マンション名<span>必須</span></label></div>
    <div class="item-body">
      <input type="text" name="title" value="<?php echo $mansion->title ?>" id="mansionTitle" required>
    </div>
  </div>
  <div class="field-item">
    <div class="item-head"><label for="">坪単価（万円）<span>必須</span></label></div>
    <div class="item-body">
      <input type="number" step="0.1" name="unit_price" placeholder="単位（万円）" value="<?php echo $mansion->unit_price ?>" id="mansionUnitPrice">
    </div>
  </div>
  <div class="field-item">
    <div class="item-head"><label for="">所在地<span>必須</span></label></div>
    <div class="item-body"><input type="text" name="address" value="<?php echo $mansion->address ?>" id="mansionAddress"></div>
  </div>
  <div class="field-item">
    <div class="item-head"><label for="">交通アクセス<span>必須</span></label></div>
    <div class="item-body"><input type="text" name="access" value="<?php echo $mansion->access ?>" id="mansionAccess"></div>
  </div>
  <div class="flexbox">
    <div class="field-item">
      <div class="item-head"><label for="">総戸数</label></div>
      <div class="item-body"><input type="number" name="total_units" value="<?php echo $mansion->total_units ?>"></div>
    </div>
    <div class="field-item">
      <div class="item-head">
        <label for="">築年月</label>
        <div>
          <span>未設定: </span>
          <input type="hidden" name="birthday_set" value="1">
          <input type="checkbox" name="birthday_set" id="checkboxBirthday" value="0" <?php echo $mansion->birthday_set ? "" : "checked" ; ?>>
        </div>
      </div>
      <div class="item-body">
        <input type="month" name="birthday" value="<?php echo $mansion->birthday->format("Y-m") ?>" id="inputBirthday">
      </div>
    </div>
    <div class="field-item">
      <div class="item-head"><label for="">階数</label></div>
      <div class="item-body"><input type="text" name="floors" value="<?php echo $mansion->floors ?>"></div>
    </div>
    <div class="field-item">
      <div class="item-head"><label for="">建築構造</label></div>
      <div class="item-body"><input type="text" name="architecture" value="<?php echo $mansion->architecture ?>"></div>
    </div>
  </div> 
  <div class="field-item w-full">
    <div class="item-head"><label for="">担当者コメント</label></div>
    <div class="item-body"><textarea name="comment"><?php echo $mansion->comment ?></textarea></div>
  </div>
  <div class="field-item w-full">
    <div class="item-head"><label for="">備考</label></div>
    <div class="item-body"><textarea name="note"><?php echo $mansion->note ?></textarea></div>
  </div>
  <div class="field-item w-full">
    <div class="item-head"><label for="">公開状況</label></div>
    <div class="item-body private">
      <p><input type="radio" name="private" value="0" <?php echo $mansion->private === 0 ? "checked" : "" ; ?>><span>公開</span></p>
      <p><input type="radio" name="private" value="1" <?php echo $mansion->private === 1 ? "checked" : "" ; ?>><span>非公開</span></p>
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
      err.push("マンション名は必須項目です");
    }
    if (document.getElementById('mansionUnitPrice').value === "") {
      err.push("坪単価は必須項目です");
    }
    if (document.getElementById('mansionAddress').value === "") {
      err.push("所在地は必須項目です");
    }
    if (document.getElementById('mansionAccess').value === "") {
      err.push("交通アクセスは必須項目です");
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

