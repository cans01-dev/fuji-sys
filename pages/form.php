<?php require 'templates/header.php'; ?>
<main>
  <div class="subpage-h2">
    <div>
      <h2 class="section-h2"><span>A</span>pproval
        <div><span></span><p>無料詳細査定</p></div>
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
    <div class="err_msg" style="display: none;">
      <ul>
        
      </ul>
    </div>
  </div>
  <?php require 'templates/forms/approval.php'; ?>

  <?php require 'templates/line.php'; ?>
</main>
<script src="https://cdn.jsdelivr.net/npm/validator@13.11.0/validator.min.js"></script>
<script src="/assets/script/contactform.js"></script>

<?php require 'templates/footer.php'; ?>