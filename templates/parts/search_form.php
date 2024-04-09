<div class="search-form">
  <form action="/mansions" name="searchForm" id="searchForm">
    <div class="flexbox">
      <div class="address">
        <label for="">名古屋市中村区</label>
        <input type="text" name="address" placeholder="以降の住所" value="<?php echo $_GET["address"] ?? "" ?>">
      </div>
      <div class="freeword">
        <input type="text" name="freeword" placeholder="マンション名" value="<?php echo $_GET["freeword"] ?? "" ?>">
      </div>
    </div>
    <div class="search-submit">
      <button type="submit" id="searchFormSubmit"><span>無料で査定結果に進む</span></button>
    </div>
  </form>
</div>
<script src="./assets/script/clean_query.js" defer></script>