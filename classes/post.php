<?php

require __DIR__.'/../vendor/autoload.php';

use Carbon\Carbon;
Carbon::setLocale('ja');

class Post
{
  public  $id, $title, $text, $image, $published_at, $private;

  function __construct()
  {
    
  }

  function get($var_name, $alter, $suffix="") {
    return $this->$var_name == "" || $this->$var_name == 0 ? $alter : $this->$var_name . $suffix;
  }

  function getImageUrl($name) {
    if ($this->$name) {
      return url("/uploads/img/{$this->$name}");
    } else {
      return url("/assets/img/no-image.png");
    }
  }

  function setAll($mansion, $full=true)
  {
    $this->title = $mansion["title"];
    $this->text = $mansion["text"];
    $this->image = $mansion["image"];
    $this->private = $mansion["private"];
    if ($full) {
      $this->id = $mansion["id"];
      $this->published_at = new Carbon($mansion["published_at"]);
    }
  }

  function create()
  {
    global $MyPDO;
    $sql = "INSERT INTO posts (
              title, text, image, published_at, private
            )
            VALUES (
              '$this->title', '$this->text', '$this->image', '$this->published_at', '$this->private'
            )";
    $MyPDO->query($sql);

    return $MyPDO->lastInsertId();
  }

  function save()
  {
    global $MyPDO;
    $sql = "UPDATE posts
            SET title = '$this->title',
                text = '$this->text',
                image = '$this->image',
                published_at = '$this->published_at',
                private = '$this->private'
            WHERE id = $this->id";
    return $MyPDO->query($sql);
  }

  function delete()
  {
    global $MyPDO;
    return $MyPDO->query("DELETE FROM posts WHERE id = $this->id");
  }
}

?>