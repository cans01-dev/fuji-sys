<?php if (isset($err_meg)): ?>
  <div class="err_msg">
    <ul>
      <?php foreach ($err_meg as $e): ?>
        <li><?php echo $e[0] ?></li>
      <?php endforeach; ?>
    </ul>
  </div>
<?php endif; ?>
<div class="admin-mansion-form">
  <div class="field-item">
    <div class="item-head"><label for="">マンション名<span>必須</span></label></div>
    <div class="item-body">
      <input type="text" name="title" value="<?php echo $mansion->title ?>" id="mansionTitle" required>
    </div>
  </div>
  <div class="field-item">
    <div class="item-head"><label for="">坪単価（万円）<span>必須</span></label></div>
    <div class="item-body">
      <input type="number" step="0.1" name="unit_price" placeholder="単位（万円）" value="<?php echo $mansion->unit_price ?>">
    </div>
  </div>
  <div class="field-item">
    <div class="item-head"><label for="">所在地<span>必須</span></label></div>
    <div class="item-body"><input type="text" name="address" value="<?php echo $mansion->address ?>"></div>
  </div>
  <div class="field-item">
    <div class="item-head"><label for="">交通アクセス<span>必須</span></label></div>
    <div class="item-body"><input type="text" name="access" value="<?php echo $mansion->access ?>"></div>
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

  function birthdayInit() {
    if (checkboxBirthday.checked) {
      inputBirthday.classList.add("disabled");
    } else {
      inputBirthday.classList.remove("disabled");
    }
  }

  birthdayInit();
  checkboxBirthday.addEventListener('change', function() {
    birthdayInit();
  });
</script>

