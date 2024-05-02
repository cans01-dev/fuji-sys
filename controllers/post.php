<?php

function posts_index()
{
  global $MyPDO;

  $posts = $MyPDO->getPosts();

  setPageTitle('NEWS');
  require_once 'pages/post/index.php';
}

function posts_show($vars)
{
  global $MyPDO;

  if (!$post = $MyPDO->getPostById($vars["id"])) {
    require_once './404.php';
    return;
  }

  $posts = $MyPDO->getPosts();

  setPageTitle($post->title);
  require_once 'pages/post/show.php';
}
