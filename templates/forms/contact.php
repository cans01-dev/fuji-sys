<?php
  # メール送信
  if(isset($_GET["submit"])) {
    mb_language("Japanese");
    mb_internal_encoding("UTF-8");

    $to = 'info@mseg.jp';
    $subject = 'お問い合わせページから';
    
    $message = "【お客様情報】\n";
    $message .= "名前:" . $_GET["first_name"] . $_GET["last_name"] . "\n";
    $message .= "名前(ひらがな):" . $_GET["first_name_gana"] . $_GET["last_name_gana"] . "\n";
    $message .= "電話番号:" . $_GET["tel"] . "\n";
    $message .= "メールアドレス:" . $_GET["email"] . "\n";
    $message .= "\n";

    $message .= "【物件情報】\n";
    $message .= "マンション名・棟:" . $_GET["manshion_name_bldg"] . "\n";
    $message .= "部屋番号:" . $_GET["room_number"] . "\n";
    $message .= "物件所在地:" . $_GET["address"] . "\n";
    $message .= "\n";

    $message .= "【お問い合わせ内容】\n";
    $message .= "お問い合わせ内容:" . $_GET["contact_content"] . "\n";
    $message .= "備考:" . $_GET["note"];

    if (mb_send_mail($to, $subject, $message)) {
      echo '<script>
                document.addEventListener("DOMContentLoaded", function() {
                    // ページの読み込みが完了したら実行
                    document.querySelector(".contactform-form").style.display = "none";

                    // statusIconsのクラス変更
                    const statusIcons = document.querySelectorAll(".status-icon");
                    statusIcons[0].classList.remove("active");
                    statusIcons[1].classList.remove("active");
                    statusIcons[2].classList.add("active");

                    // 入力必須事項の文言を非表示
                    document.querySelector(".supply").style.display = "none";
                });
              </script>';
        echo '<div style="padding: 30px; padding-bottom: 70px"><p style="text-align: center">送信が完了しました。</p></div>';
    }
  }
?>

<div class="contactform-form">
  <form action="" method="get" id="contactform-contact" name="contact">
    <h3>お客様情報</h3>
    <ul class="field-list">
      <li class="field-item">
        <div class="field-head"><label class="required">名前</label></div>
        <div class="field-body">
          <div class="field-children">
            <div class="child-field">
              <div class="child-head"><label>性</label></div>
              <div class="child-body"><input type="text" name="first_name"></div>
            </div>
            <div class="child-field">
              <div class="child-head"><label>名</label></div>
              <div class="child-body"><input type="text" name="last_name"></div>
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
              <div class="child-body"><input type="text" name="first_name_gana"></div>
            </div>
            <div class="child-field">
              <div class="child-head"><label>めい</label></div>
              <div class="child-body"><input type="text" name="last_name_gana"></div>
            </div>
          </div>
        </div>
      </li>
      <li class="field-item">
        <div class="field-head"><label class="required">電話番号</label></div>
        <div class="field-body"><input type="tel" name="tel"></div>
      </li>
      <li class="field-item">
        <div class="field-head"><label class="required">メールアドレス</label></div>
        <div class="field-body"><input type="email" name="email"></div>
      </li>
    </ul>
    <h3>物件情報</h3>
    <ul class="field-list">
      <li class="field-item">
        <div class="field-head"><label class="required">マンション名・棟</label></div>
        <div class="field-body"><input type="text" name="manshion_name_bldg"></div>
      </li>
      <li class="field-item">
        <div class="field-head"><label class="required">部屋番号</label></div>
        <div class="field-body"><input type="text" name="room_number"></div>
      </li>
      <li class="field-item">
        <div class="field-head"><label class="required">物件所在地</label></div>
        <div class="field-body"><input type="text" name="address"></div>
      </li>
    </ul>
    <h3>お問い合わせ内容</h3>
    <ul class="field-list">
      <li class="field-item">
        <div class="field-head"><label class="required">お問い合わせ内容</label></div>
        <div class="field-body">
          <div class="select-wrapper">
            <select name="contact_content" id="">
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
          <label>備考</label>
          <p>※ご希望連絡時間やご相談物件の特徴などございましたらお聞かせください。</p>
        </div>
        <div class="field-body"><textarea name="note" id="" cols="30" rows="10"></textarea></div>
      </li>
    </ul>
    <div class="contactform-footer">
      <p>個人情報の取扱いについて<br class="sp-br">（必ずお読みください）</p>
      <div class="privacy-policy"><a href="/privacy-policy">プライバシーポリシー</a></div>
      <div class="approval">
        <p>
          <input type="hidden" name="approval" value="0">
          <input type="checkbox" name="approval" value="1" class="approvalInput">
          <label>上記に同意する<span> *</span></label>
        </p>
      </div>
      <div class="back"><button type="button" onclick="backOnClick()">入力画面に戻る</button></div>
      <div class="submit"><input type="submit" name="submit" value="送信する"></div>
      <div class="confirm"><button type="button" onclick="comfirmOnClick()">確認画面へ</button></div>
    </div>
  </form>
</div>
