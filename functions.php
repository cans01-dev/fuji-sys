<?php

function url_param_change($par=Array(),$op=0){
  $url = parse_url($_SERVER["REQUEST_URI"]);
  if(isset($url["query"])) parse_str($url["query"],$query);
  else $query = Array();
  foreach($par as $key => $value){
      if($key && is_null($value)) unset($query[$key]);
      else $query[$key] = $value;
  }
  $query = str_replace("=&", "&", http_build_query($query));
  $query = preg_replace("/=$/", "", $query);
  return $query ? (!$op ? "?" : "").htmlspecialchars($query, ENT_QUOTES) : "";
}

function get_page_numbers($posts_par_page, $posts_sum, $page) {
  $first = 1;
  $last = ceil($posts_sum / $posts_par_page);
  $offset = $posts_par_page * ($page - 1);
  return [
    "current" => $page,
    "prev" => $page - 1 < $first ? false : $page - 1,
    "next" => $page + 1 > $last ? false : $page + 1,
    "first" => $page - 2 < $first ? false : $first,
    "last" => $page + 2 > $last ? false : $last,
    "offset" => $offset,
    "current_start" => $offset + 1,
    "current_end" => $posts_sum < $offset + $posts_par_page ? $posts_sum : $offset + $posts_par_page,
  ];
}

function to_class_object($result) {
  $mansion =  new Mansion();
  $mansion->setAll($result);
  return $mansion;
}

function url($path = '') {
  $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
  $url = $protocol . '://' . $_SERVER['HTTP_HOST'] . $path;
  return $url;
}

function toastMeg($type, $msg) {
  $_SESSION["toast_msg"] = ['type' => $type, 'msg' => $msg];
}

function adminAuth() {
  if (isset($_SESSION["admin"])) {
    return true;
  } else {
    toastMeg("warning", "ログインしてください");
    $url = url("/admin/login");
    header("Location: $url");
    exit;
  }
}

function getPageTitle() {
  global $pageTitle;
  return "マンション販売精鋭集団｜$pageTitle";
}

function setPageTitle($str) {
  global $pageTitle;
  $pageTitle = $str;
}

?>