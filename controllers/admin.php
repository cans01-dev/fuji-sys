<?php 

use Carbon\Carbon;
use Valitron\Validator;

Validator::lang('ja');  

function admin_index() {
  require_once 'pages/admin/index.php';
}

function admin_mansions_index() {
  global $MyPDO, $toast_msg;
  
  $limit = $_GET["limit"] ?? 20;
  $page = $_GET["page"] ?? 1;
  $order = $_GET["order"] ?? 'latest';
  $address = $_GET["address"] ?? null;
  $freeword = $_GET["freeword"] ?? null;

  $mansions_count = $MyPDO->getMansions($address, $freeword, count: true, includePrivete: true);
  $pgnt = get_page_numbers($limit, $mansions_count, $page);
  $offset = $pgnt["offset"];
  
  $mansions = $MyPDO->getMansions($address, $freeword, $order, $limit, $offset, includePrivete: true);
  $pgnt_stmt = "{$mansions_count}件中{$pgnt["current_start"]}～{$pgnt["current_end"]}件を表示";

  require_once 'pages/admin/mansion_index.php';
}

function admin_mansions_create() {
  global $httpMethod;

  $mansion = new Mansion();
  $mansion->birthday = new Carbon();
  $mansion->birthday_set = 0;
  
  if ($httpMethod === 'POST') {
    $mansion->setAll($_POST, false);
    $err_meg = $_SESSION["err_msg"];
    unset($_SESSION["err_msg"]);
  }

  require_once 'pages/admin/mansion_create.php';
}

function admin_mansions_store() {
  global $MyPDO;

  $v = new Validator($_POST);  
  $v->labels(['title' => 'マンション名', 'unit_price' => '坪単価', 'address' => '所在地', 'access' => '交通アクセス']);
  $v->rule('required', ['title', 'unit_price', 'address', 'access'])->message('{field}は必須項目です'); 

  if(!$v->validate()) {
      $_SESSION["err_msg"] = $v->errors();
      $url = url("/admin/mansions/create");
      header("Location: $url", true, 307);
      exit();
  }

  $mansion = new Mansion();
  $mansion->title = $_POST["title"];
  $mansion->unit_price = $_POST["unit_price"];
  $mansion->comment = $_POST["comment"];
  $mansion->address = $_POST["address"];
  $mansion->access = $_POST["access"];
  $mansion->total_units = $_POST["total_units"];
  $mansion->birthday = $_POST["birthday"]."-01";
  $mansion->birthday_set = $_POST["birthday_set"];
  $mansion->floors = $_POST["floors"];
  $mansion->architecture = $_POST["architecture"];
  $mansion->note = $_POST["note"];
  $mansion->private = $_POST["private"];

  $created_id = $mansion->create();

  $url = url("/admin/mansions/{$created_id}/edit");
  header("Location: $url");
  exit;
}

function admin_mansions_edit($vars) {
  global $MyPDO, $httpMethod, $toast_msg;

  if (!$result = $MyPDO->getMansionById($vars["id"], includePrivete: true)) {
    require_once './404.php';
    return;
  }
  $mansion = new Mansion();
  $mansion->setAll($result);

  if ($httpMethod === 'GET') {
    unset($_SESSION["err_msg"]);
  } elseif ($httpMethod === 'PUT') {
    $mansion->setAll($_POST, false);
    $err_meg = $_SESSION["err_msg"];
  }
  require_once 'pages/admin/mansion_edit.php';
}

function admin_mansions_update($vars) {
  global $MyPDO;

  $result = $MyPDO->getMansionById($vars["id"], includePrivete: true);

  $mansion = new Mansion();
  $mansion->setAll($result);

  $v = new Validator($_POST);  
  $v->labels(['title' => 'マンション名', 'unit_price' => '坪単価', 'address' => '所在地', 'access' => '交通アクセス']);
  $v->rule('required', ['title', 'unit_price', 'address', 'access'])->message('{field}は必須項目です'); 

  $mansion_id = $vars["id"];
  if(!$v->validate()) {
    toastMeg("error", "更新できませんでした");
    $_SESSION["err_msg"] = $v->errors();
    $url = url("/admin/mansions/$mansion_id/edit");
    header("Location: $url", true, 307);
    exit();
  }

  $mansion->title = $_POST["title"];
  $mansion->unit_price = $_POST["unit_price"];
  $mansion->comment = $_POST["comment"];
  $mansion->address = $_POST["address"];
  $mansion->access = $_POST["access"];
  $mansion->total_units = $_POST["total_units"];
  $mansion->birthday = $_POST["birthday"]."-01";
  $mansion->birthday_set = $_POST["birthday_set"];
  $mansion->floors = $_POST["floors"];
  $mansion->architecture = $_POST["architecture"];
  $mansion->note = $_POST["note"];
  $mansion->private = $_POST["private"];
  $mansion->save();

  toastMeg("success", "{$mansion->title}を更新しました");
  $url = url("/admin/mansions/{$mansion->id}/edit");
  header("Location: $url");
  exit;
}

function admin_mansions_delete($vars) {
  global $MyPDO;

  $result = $MyPDO->getMansionById($vars["id"], includePrivete: true);

  $mansion = new Mansion();
  $mansion->setAll($result);
  $mansion->delete();

  toastMeg("success", "{$mansion->title}を削除しました");
  $url = url("/admin/mansions");
  header("Location: $url");
  exit;
}

function admin_login_get() {
  // require_once '';
}

?>