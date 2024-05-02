<?php

use Carbon\Carbon;
use Ramsey\Uuid\Nonstandard\Uuid;
use Valitron\Validator;

Validator::lang('ja');  

function admin_posts_index() {
  global $MyPDO, $toast_msg;
  adminAuth();

  $posts = $MyPDO->getPosts(true);

  require_once 'pages/admin/posts/index.php';
}

function admin_posts_create() {
  global $httpMethod, $toast_msg, $err_meg;
  adminAuth();

  # 初期値の指定
  $post = new Post();
  $post->published_at = new Carbon();
  $post->private = 0;
  
  require_once 'pages/admin/posts/create.php';
}

function admin_posts_store() {
  global $MyPDO;
  adminAuth();

  $v = new Validator($_POST);  
  $v->labels(['title' => 'タイトル']);
  $v->rule('required', ['title'])->message('{field}は必須項目です'); 

  if(!$v->validate()) {
    toastMeg("error", "登録できませんでした");
    $_SESSION["err_msg"] = $v->errors();
    $url = url("/admin/posts/create");
    header("Location: $url");
    exit();
  }

  $post = new post();
  $post->title = $_POST["title"];
  $post->text = $_POST["text"];
  $post->published_at = $_POST["published_at"];
  $post->private = $_POST["private"];

  $image = $_FILES["image"];
  if (!empty($image["name"])) {
    $filename = Uuid::uuid4() . strrchr($image["name"], ".");
    move_uploaded_file($image["tmp_name"], "./uploads/img/" . $filename);
    $post->image = $filename;
  } elseif ($_POST["imageClear"] == "1") {
    $post->image = "";
  }

  $created_id = $post->create();
  $url = url("/admin/posts/{$created_id}/edit");
  header("Location: $url");
  exit;
}

function admin_posts_edit($vars) {
  global $MyPDO, $httpMethod, $toast_msg, $err_meg;
  adminAuth();

  if (!$post = $MyPDO->getpostById($vars["id"], includePrivete: true)) {
    require_once './404.php';
    return;
  }

  require_once 'pages/admin/posts/edit.php';
}

function admin_posts_update($vars) {
  global $MyPDO;
  adminAuth();

  $v = new Validator($_POST);  
  $v->labels(['title' => 'タイトル']);
  $v->rule('required', ['title'])->message('{field}は必須項目です'); 

  $post_id = $vars["id"];
  if(!$v->validate()) {
    toastMeg("error", "更新できませんでした");
    $_SESSION["err_msg"] = $v->errors();
    $url = url("/admin/posts/$post_id/edit");
    header("Location: $url");
    exit();
  }

  $post = $MyPDO->getpostById($vars["id"], includePrivete: true);

  $post->title = $_POST["title"];
  $post->text = $_POST["text"];
  $post->image = $_POST["image"];
  $post->published_at = $_POST["published_at"];
  $post->private = $_POST["private"];
  
  $image = $_FILES["image"];
  if (!empty($image["name"])) {
    $filename = Uuid::uuid4() . strrchr($image["name"], ".");
    move_uploaded_file($image["tmp_name"], "./uploads/img/" . $filename);
    $post->image = $filename;
  } elseif ($_POST["imageClear"] == "1") {
    $post->image = "";
  }

  $post->save();
  toastMeg("success", "{$post->title}を更新しました");
  $url = url("/admin/posts/{$post->id}/edit");
  header("Location: $url");
  exit;
}

function admin_posts_delete($vars) {
  global $MyPDO;
  adminAuth();

  $post = $MyPDO->getPostById($vars["id"], includePrivete: true);

  $post->delete();

  toastMeg("success", "{$post->title}を削除しました");
  $url = url("/admin/posts");
  header("Location: $url");
  exit;
}