<div class="search-bg">
  <section class="search">
    <div class="search-form">
      <form action="/form" method="get">
        <p class="benner-p">上記査定金額以上で<br>売却をご希望の方はこちら</p>
        <div class="search-submit">
          <input type="submit" value="無料で査定結果に進む">
          <input type="hidden" name="m_id" value="<?php echo $mansion->id ?>">
          <input type="hidden" name="m_title" value="<?php echo $mansion->title ?>">
          <input type="hidden" name="m_address" value="<?php echo $mansion->address ?>">
        </div>
      </form>
    </div>
  </section>
</div>