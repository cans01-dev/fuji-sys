<?php 

function admin_login_get() {
  global $toast_msg;

  require_once './login.php';
}

function admin_login_post() {
  $password = $_POST["password"];
  if (password_verify($password, ADMIN_PASSWORD)) {
    $_SESSION["admin"] = "admin";
    toastMeg("success", "管理画面にログインしました");
    $url = url("/admin/mansions");
    header("Location: $url");
    exit;
  } else {
    toastMeg("error", "パスワードが違います");
    $url = url("/admin/login");
    header("Location: $url");
    exit;
  }
}

function admin_logout() {
  $_SESSION = array();
  session_destroy();

  session_start();
  toastMeg("success", "管理画面からログアウトしました");
  $url = url("/admin/login");
  header("Location: $url");
  exit;
}

?>