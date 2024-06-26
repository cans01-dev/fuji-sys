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
    <form action="/contact-confirm" method="post" id="contactform-contact" name="contact">
      <h3>お客様情報</h3>
      <ul class="field-list">
        <li class="field-item">
          <div class="field-head"><label class="required">名前</label></div>
          <div class="field-body">
            <div class="field-children">
              <div class="child-field">
                <div class="child-head"><label>性</label></div>
                <div class="child-body"><input type="text" name="first_name" required></div>
              </div>
              <div class="child-field">
                <div class="child-head"><label>名</label></div>
                <div class="child-body"><input type="text" name="last_name" required></div>
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
                <div class="child-body"><input type="text" name="first_name_gana" required></div>
              </div>
              <div class="child-field">
                <div class="child-head"><label>めい</label></div>
                <div class="child-body"><input type="text" name="last_name_gana" required></div>
              </div>
            </div>
          </div>
        </li>
        <li class="field-item">
          <div class="field-head"><label class="required">電話番号</label></div>
          <div class="field-body"><input type="tel" name="tel" required></div>
        </li>
        <li class="field-item">
          <div class="field-head"><label class="required">メールアドレス</label></div>
          <div class="field-body"><input type="email" name="email" required></div>
        </li>
      </ul>
      <h3>物件情報</h3>
      <ul class="field-list">
        <li class="field-item">
          <div class="field-head"><label class="required">マンション名・棟</label></div>
          <div class="field-body"><input type="text" name="manshion_name_bldg" required></div>
        </li>
        <li class="field-item">
          <div class="field-head"><label class="required">部屋番号</label></div>
          <div class="field-body"><input type="text" name="room_number" required></div>
        </li>
        <li class="field-item">
          <div class="field-head"><label class="required">物件所在地</label></div>
          <div class="field-body"><input type="text" name="address" required></div>
        </li>
      </ul>
      <h3>お問い合わせ内容</h3>
      <ul class="field-list">
        <li class="field-item">
          <div class="field-head"><label class="required">お問い合わせ内容</label></div>
          <div class="field-body">
            <div class="select-wrapper">
              <select name="contact_content" id="" required>
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
          <div class="field-body"><textarea name="note" id="" cols="30" rows="10" required></textarea></div>
        </li>
      </ul>
      <div class="contactform-footer">
        <p>個人情報の取扱いについて（必ずお読みください）</p>
        <div class="privacy-policy"><a href="">プライバシーポリシー</a></div>
        <div class="approval"><p><input type="checkbox"><label>上記に同意する<span> *</span></label></p></div>

        <div class="confirm"><input type="submit" value="確認画面へ"></div>
      </div>
    </form>
  </div>

  <?php require 'templates/line.php'; ?>
</main>

<?php require 'templates/footer.php'; ?>