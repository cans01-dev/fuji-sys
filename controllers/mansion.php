<?php

function mansions_index()
{
  global $MyPDO;

  $limit = $_GET["limit"] ?? 20;
  $page = $_GET["page"] ?? 1;
  $order = $_GET["order"] ?? 'latest';
  $address = $_GET["address"] ?? null;
  if ($address !== null) {
    $address = mb_convert_kana($address, 'ASKV');
    $pattern = ['丁目'];
    $replace = ['－'];
    $address = str_replace($pattern, $replace, $address);
    $pattern = ['ー'];
    $replace = ['－'];
    $address = str_replace($pattern, $replace, $address);
  }
  $freeword = $_GET["freeword"] ?? null;
  if ($freeword !== null) {
    $freeword = mb_convert_kana($freeword, 'ASKV');
  }

  $mansions_count = $MyPDO->getMansions($address, $freeword, count: true);
  $pgnt = get_page_numbers($limit, $mansions_count, $page);
  $offset = $pgnt["offset"];

  $mansions = $MyPDO->getMansions($address, $freeword, $order, $limit, $offset);
  $pgnt_stmt = "{$mansions_count}件中{$pgnt["current_start"]}～{$pgnt["current_end"]}件を表示";

  setPageTitle('マンション一覧');
  require_once 'pages/mansion/index.php';
}

function mansions_show($vars)
{
  global $MyPDO;

  if (!$mansion = $MyPDO->getMansionById($vars["id"])) {
    require_once './404.php';
    return;
  }

  $mansions = $MyPDO->getMansions(null, null, 'random', 3);

  setPageTitle($mansion->title);
  require_once 'pages/mansion/show.php';
}
