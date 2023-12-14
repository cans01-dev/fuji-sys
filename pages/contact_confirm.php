<?php require 'templates/header.php'; ?>
<main>
  <div class="subpage-h2">
    <div>
      <h2 class="section-h2"><span>C</span>ontact
        <div><span></span><p>お問い合わせ</p></div>
      </h2>
    </div>
  </div>
  <div class="contactform-status">
    <ul class="flex-list">
      <li class="flex-item">
        <div class="status-icon active" id="status-1">
          <span>1</span>
        </div>
        <p>入力</p>
      </li>
      <li class="flex-item">
        <div class="status-icon" id="status-2">
          <span>2</span>
        </div>
        <p>確認</p>
      </li>
      <li class="flex-item">
        <div class="status-icon" id="status-3">
          <span>3</span>
        </div>
        <p>完了</p>
      </li>
    </ul>
    <div class="supply">
      <p><span>*</span> は入力必須事項です。</p>
    </div>
  </div>
  <div class="contactform-form">
    <form action="" method="post" id="contactform-contact" name="contact" value="<?php echo $_POST["contact"] ?>">
      <h3>お客様情報</h3>
      <ul class="field-list">
        <li class="field-item">
          <div class="field-head"><label class="required">名前</label></div>
          <div class="field-body">
            <div class="field-children">
              <div class="child-field">
                <div class="child-head"><label>性</label></div>
                <div class="child-body"><input type="text" name="first_name" value="<?php echo $_POST["first_name"] ?>" required disabled></div>
              </div>
              <div class="child-field">
                <div class="child-head"><label>名</label></div>
                <div class="child-body"><input type="text" name="last_name" value="<?php echo $_POST["last_name"] ?>" required disabled></div>
              </div>
            </div>
          </div>
        </li>
        <li class="field-item">
          <div class="field-head"><label class="required">なまえ（ふりがな）</label></div>
          <div class="field-body">
            <div class="field-children">
              <div class="child-field">
                <div class="child-head"><label>せい</label></div>
                <div class="child-body"><input type="text" name="first_name_gana" value="<?php echo $_POST["first_name_gana"] ?>" required disabled></div>
              </div>
              <div class="child-field">
                <div class="child-head"><label>めい</label></div>
                <div class="child-body"><input type="text" name="last_name_gana" value="<?php echo $_POST["last_name_gana"] ?>" required disabled></div>
              </div>
            </div>
          </div>
        </li>
        <li class="field-item">
          <div class="field-head"><label class="required">電話番号</label></div>
          <div class="field-body"><input type="tel" name="tel" value="<?php echo $_POST["tel"] ?>" required disabled></div>
        </li>
        <li class="field-item">
          <div class="field-head"><label class="required">メールアドレス</label></div>
          <div class="field-body"><input type="email" name="email" value="<?php echo $_POST["email"] ?>" required disabled></div>
        </li>
      </ul>
      <h3>物件情報</h3>
      <ul class="field-list">
        <li class="field-item">
          <div class="field-head"><label class="required">マンション名・棟</label></div>
          <div class="field-body"><input type="text" name="manshion_name_bldg" value="<?php echo $_POST["manshion_name_bldg"] ?>" required disabled></div>
        </li>
        <li class="field-item">
          <div class="field-head"><label class="required">部屋番号</label></div>
          <div class="field-body"><input type="text" name="room_number" value="<?php echo $_POST["room_number"] ?>" required disabled></div>
        </li>
        <li class="field-item">
          <div class="field-head"><label class="required">物件所在地</label></div>
          <div class="field-body"><input type="text" name="address" value="<?php echo $_POST["address"] ?>" required disabled></div>
        </li>
      </ul>
      <h3>お問い合わせ内容</h3>
      <ul class="field-list">
        <li class="field-item">
          <div class="field-head"><label class="required">お問い合わせ内容</label></div>
          <div class="field-body">
            <div class="select-wrapper">
              <select name="contact_content" value="<?php echo $_POST["contact_content"] ?>" id="" required disabled>
                <option hidden>選択してください</option>
                <option value="相続についてのご相談">相続についてのご相談</option>
                <option value="買い替えについてのご相談">買い替えについてのご相談</option>
                <option value="ポスティング不要のご依頼">ポスティング不要のご依頼</option>
                <option value="その他">その他</option>
              </select>
            </div>
          </div>
        </li>
        <li class="field-item textarea">
          <div class="field-head">
            <label class="required">備考</label>
            <p>※ご希望連絡時間やご相談物件の特徴などございましたらお聞かせください。</p>
          </div>
          <div class="field-body"><textarea name="note" value="<?php echo $_POST["note"] ?>" id="" cols="30" rows="10" required disabled></textarea></div>
        </li>
      </ul>
      <div class="contactform-footer">
        <p>個人情報の取扱いについて（必ずお読みください）</p>
        <div class="privacy-policy"><a href="">プライバシーポリシー</a></div>
        <div class="approval"><p><input type="checkbox"><label>上記に同意する<span> *</span></label></p></div>

        <div class="confirm"><button type="button" id="confirm-btn"><span>確認画面へ</span></button></div>
        <div class="submit"><button type="button" id="submit-btn"><span>送信する</span></button></div>
        <div class="back"><button type="button" id="back-btn"><span>入力画面に戻る</span></button></div>

        <div id="circularG" style="display: none;">
          <div id="circularG_1" class="circularG"></div>
          <div id="circularG_2" class="circularG"></div>
          <div id="circularG_3" class="circularG"></div>
          <div id="circularG_4" class="circularG"></div>
          <div id="circularG_5" class="circularG"></div>
          <div id="circularG_6" class="circularG"></div>
          <div id="circularG_7" class="circularG"></div>
          <div id="circularG_8" class="circularG"></div>
        </div>
      </div>
    </form>
  </div>
  <div class="contactform-thanks">
    <p>送信が完了しました。</p>
  </div>

  <?php require 'templates/line.php'; ?>
</main>
<script src="../assets/script/contactform.js"></script>

<?php require 'templates/footer.php'; ?>