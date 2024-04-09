<?php
  # メール送信
  if(isset($_GET["submit"])) {
    mb_language("Japanese");
    mb_internal_encoding("UTF-8");

    $to = 'info@mseg.jp';
    $subject = 'アンケートページから';
    
    $message = "【お客様情報】\n";
    $message .= "名前:" . $_GET["first_name"] . $_GET["last_name"] . "\n";
    $message .= "名前(ひらがな):" . $_GET["first_name_gana"] . $_GET["last_name_gana"] . "\n";
    $message .= "電話番号:" . $_GET["tel"] . "\n";
    $message .= "メールアドレス:" . $_GET["email"] . "\n";
    $message .= "\n";

    $message .= "【アンケート】\n";
    $message .= "ご家族:" . $_GET["family"] . "\n";
    $message .= "職業:" . $_GET["job"] . "\n";
    $message .= "勤務地等:" . $_GET["job_field"] . "\n";
    $message .= "勤続年数:" . $_GET["length"] . "\n";
    $message .= "現在の住居:" . $_GET["house"] . "\n";
    $message .= "現在の家賃:" . $_GET["rent"] . "\n";
    $message .= "現在の間取:" . $_GET["floor"] . "\n";
    $message .= "何で知りましたか:" . $_GET["howknow"] . "\n";
    $message .= "住宅を必要とする理由:" . $_GET["reason"] . "\n";
    $message .= "住宅購入の際お考えになること:" . $_GET["worry"] . "\n";
    $message .= "ご購入についてはお急ぎでしょうか:" . $_GET["hurry"] . "\n";
    $message .= "自己資金:" . $_GET["fund"] . "\n";
    $message .= "ご希望予算:" . $_GET["budget"] . "\n";
    $message .= "ご希望の間取:" . $_GET["request_floor"] . "\n";
    $message .= "月々の支払ご希望額:" . $_GET["request_payment"] . "\n";
    $message .= "年収:" . $_GET["annual_income"] . "\n";
    $message .= "ご希望物件:" . $_GET["request_property"] . "\n";
    $message .= "ご希望地域:" . $_GET["request_area"] . "\n";
    $message .= "備考:" . $_GET["note"] . "\n";

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
    <h3>アンケート</h3>
    <ul class="field-list">
      <li class="field-item">
        <div class="field-head"><label>ご家族</label></div>
        <div class="field-body">
          <div class="select-wrapper">
            <select name="family" id="">
              <option hidden>選択してください</option>
              <option value="1人">1人</option>
              <option value="2人">2人</option>
              <option value="3人">3人</option>
              <option value="4人">4人</option>
              <option value="5人">5人</option>
              <option value="6人以上">6人以上</option>
            </select>
          </div>
        </div>
      </li>
      <li class="field-item">
        <div class="field-head"><label>職業</label></div>
        <div class="field-body">
          <div class="select-wrapper">
            <select name="job" id="">
              <option hidden>選択してください</option>
              <option value="会社員">会社員</option>
              <option value="会社役員">会社役員</option>
              <option value="自営業">自営業</option>
              <option value="公務員">公務員</option>
              <option value="その他">その他</option>
            </select>
          </div>
        </div>
      </li>
      <li class="field-item">
        <div class="field-head"><label>勤務地等</label></div>
        <div class="field-body"><input type="text" name="job_field"></div>
      </li>
      <li class="field-item">
        <div class="field-head"><label>勤続年数</label></div>
        <div class="field-body">
          <div class="select-wrapper">
            <select name="length" id="">
              <option hidden>選択してください</option>
              <option value="1年未満">1年未満</option>
              <option value="1年以上">1年以上</option>
              <option value="2年以上">2年以上</option>
              <option value="3年以上">3年以上</option>
            </select>
          </div>
        </div>
      </li>
      <li class="field-item">
        <div class="field-head"><label>現在の住居</label></div>
        <div class="field-body">
          <div class="select-wrapper">
            <select name="house" id="">
              <option hidden>選択してください</option>
              <option value="賃貸住宅">賃貸住宅</option>
              <option value="持ち家">持ち家</option>
              <option value="親族と同居">親族と同居</option>
              <option value="その他">その他</option>
            </select>
          </div>
        </div>
      </li>
      <li class="field-item">
        <div class="field-head"><label>現在の家賃</label></div>
        <div class="field-body"><input type="text" name="rent"></div>
      </li>
      <li class="field-item">
        <div class="field-head"><label>現在の間取</label></div>
        <div class="field-body">
          <div class="select-wrapper">
            <select name="floor" id="">
              <option hidden>選択してください</option>
              <option value="1DK">1DK</option>
              <option value="2DK">2DK</option>
              <option value="2LDK">2LDK</option>
              <option value="3DK">3DK</option>
              <option value="3LDK">3LDK</option>
              <option value="4DK">4DK</option>
              <option value="4LDK">4LDK</option>
              <option value="その他">その他</option>
            </select>
          </div>
        </div>
      </li>
      <li class="field-item">
        <div class="field-head"><label>何で知りましたか</label></div>
        <div class="field-body">
          <div class="select-wrapper">
            <select name="howknow" id="">
              <option hidden>選択してください</option>
              <option value="インターネット">インターネット</option>
              <option value="チラシ">チラシ</option>
              <option value="知人友人の紹介">知人友人の紹介</option>
              <option value="看板">看板</option>
              <option value="その他">その他</option>
            </select>
          </div>
        </div>
      </li>
      <li class="field-item">
        <div class="field-head"><label>住宅を必要とする理由</label></div>
        <div class="field-body">
          <div class="select-wrapper">
            <select name="reason" id="">
              <option hidden>選択してください</option>
              <option value="現住居が狭い">現住居が狭い</option>
              <option value="現住居が古い">現住居が古い</option>
              <option value="環境が悪い">環境が悪い</option>
              <option value="家賃が高い">家賃が高い</option>
              <option value="転勤">転勤</option>
              <option value="通勤通学に不便">通勤通学に不便</option>
              <option value="新居として（結婚）">新居として（結婚）</option>
              <option value="その他">その他</option>
            </select>
          </div>
        </div>
      </li>

      <li class="field-item">
        <div class="field-head"><label>住宅購入の際<br>お考えになること</label></div>
        <div class="field-body">
          <div class="select-wrapper">
            <select name="worry" id="">
              <option hidden>選択してください</option>
              <option value="返済は大丈夫？">返済は大丈夫？</option>
              <option value="頭金が足りないのでは？">頭金が足りないのでは？</option>
              <option value="間取り、クオリティ">間取り、クオリティ</option>
              <option value="親の説得が必要（資金援助）">親の説得が必要（資金援助）</option>
              <option value="学校区">学校区</option>
              <option value="その他">その他</option>
            </select>
          </div>
        </div>
      </li>
      <li class="field-item">
        <div class="field-head"><label>ご購入については<br>お急ぎでしょうか</label></div>
        <div class="field-body">
          <div class="select-wrapper">
            <select name="hurry" id="">
              <option hidden>選択してください</option>
              <option value="今すぐにでも">今すぐにでも</option>
              <option value="半年以内">半年以内</option>
              <option value="1年以内">1年以内</option>
              <option value="2年以内">2年以内</option>
              <option value="それ以降">それ以降</option>
            </select>
          </div>
        </div>
      </li>
      <li class="field-item">
        <div class="field-head"><label>自己資金</label></div>
        <div class="field-body"><input type="text" name="fund"></div>
      </li>
      <li class="field-item">
        <div class="field-head"><label>ご希望予算</label></div>
        <div class="field-body"><input type="text" name="budget"></div>
      </li>
      <li class="field-item">
        <div class="field-head"><label>ご希望の間取</label></div>
        <div class="field-body">
          <div class="select-wrapper">
            <select name="request_floor" id="request_floor">
              <option hidden>選択してください</option>
              <option value="1R">1R</option>
              <option value="2LDK">2LDK</option>
              <option value="3LDK">3LDK</option>
              <option value="4LDK">4LDK</option>
              <option value="5LDK">5LDK</option>
              <option value="その他">その他</option>
            </select>
          </div>
        </div>
      </li>
      <li class="field-item">
        <div class="field-head"><label>月々の支払ご希望額</label></div>
        <div class="field-body">
          <div class="select-wrapper">
            <select name="request_payment" id="request_payment">
              <option hidden>選択してください</option>
              <option value="4万円未満">4万円未満</option>
              <option value="4万円以上">4万円以上</option>
              <option value="5万円以上">5万円以上</option>
              <option value="6万円以上">6万円以上</option>
              <option value="7万円以上">7万円以上</option>
              <option value="8万円以上">8万円以上</option>
              <option value="9万円以上">9万円以上</option>
              <option value="10万円以上">10万円以上</option>
            </select>
          </div>
        </div>
      </li>
      <li class="field-item">
        <div class="field-head"><label>年収</label></div>
        <div class="field-body">
          <div class="select-wrapper">
            <select name="annual_income" id="annual_income">
              <option hidden>選択してください</option>
              <option value="400万円未満">400万円未満</option>
              <option value="400万円以上">400万円以上</option>
              <option value="500万円以上">500万円以上</option>
              <option value="600万円以上">600万円以上</option>
              <option value="700万円以上">700万円以上</option>
              <option value="800万円以上">800万円以上</option>
              <option value="900万円以上">900万円以上</option>
              <option value="1000万円以上">1000万円以上</option>
            </select>
          </div>
        </div>
      </li>
      <li class="field-item">
        <div class="field-head"><label>ご希望別件</label></div>
        <div class="field-body">
          <div class="select-wrapper">
            <select name="request_property" id="request_property">
              <option hidden>選択してください</option>
              <option value="新築一戸建て">新築一戸建</option>
              <option value="中古戸建">中古戸建</option>
              <option value="新築マンション">新築マンション</option>
              <option value="中古マンション">中古マンション</option>
              <option value="土地">土地</option>
            </select>
          </div>
        </div>
      </li>
      <li class="field-item">
        <div class="field-head"><label>ご希望地域</label></div>
        <div class="field-body"><input type="text" name="request_area"></div>
      </li>
      <li class="field-item textarea">
        <div class="field-head">
          <label>備考</label>
          <p>※ご希望連絡時間やご相談物件の特徴などございましたらお聞かせください。</p>
        </div>
        <div class="field-body"><textarea name="note" id="note" cols="30" rows="10"></textarea></div>
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
