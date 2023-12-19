<?php 

function index() {
  setPageTitle('トップ');
  require_once 'pages/top.php';
}

function contact() {
  setPageTitle('お問い合わせ');
  require_once 'pages/contact.php';
}

function privacy_policy() {
  setPageTitle('プライバシーポリシー');
  require_once 'pages/privacy_policy.php';
}

function mansions_index() {
  global $MyPDO;
  
  $limit = $_GET["limit"] ?? 20;
  $page = $_GET["page"] ?? 1;
  $order = $_GET["order"] ?? 'latest';
  $address = $_GET["address"] ?? null;
  $freeword = $_GET["freeword"] ?? null;

  $mansions_count = $MyPDO->getMansions($address, $freeword, count: true);
  $pgnt = get_page_numbers($limit, $mansions_count, $page);
  $offset = $pgnt["offset"];
  
  $mansions = $MyPDO->getMansions($address, $freeword, $order, $limit, $offset);
  $pgnt_stmt = "{$mansions_count}件中{$pgnt["current_start"]}～{$pgnt["current_end"]}件を表示";
  
  setPageTitle('マンション一覧');
  require_once 'pages/mansion_index.php';
}

function mansions_show($vars) {
  global $MyPDO;

  if (!$result = $MyPDO->getMansionById($vars["id"])) {
    require_once './404.php';
    return;
  }
  $mansion = new Mansion();
  $mansion->setAll($result);
  
  setPageTitle($mansion->title);
  require_once 'pages/mansion_show.php';
}


?>