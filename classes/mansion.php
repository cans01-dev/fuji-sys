<?php

require __DIR__.'/../vendor/autoload.php';

use Carbon\Carbon;
Carbon::setLocale('ja');

class Mansion
{
  public  $id, $title, $unit_price, $comment, $address, $access, $total_units, $birthday, $birthday_set,
          $floors, $architecture, $note, $created_at, $private, $image1, $image2, $image3, $image4;

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
    $this->unit_price = $mansion["unit_price"];
    $this->comment = $mansion["comment"];
    $this->address = $mansion["address"];
    $this->access = $mansion["access"];
    $this->total_units = $mansion["total_units"];
    $this->birthday = new Carbon($mansion["birthday"]);
    $this->birthday_set = $mansion["birthday_set"];
    $this->floors = $mansion["floors"];
    $this->architecture = $mansion["architecture"];
    $this->note = $mansion["note"];
    $this->private = $mansion["private"];
    $this->image1 = $mansion["image1"];
    $this->image2 = $mansion["image2"];
    $this->image3 = $mansion["image3"];
    $this->image4 = $mansion["image4"];
    if ($full) {
      $this->id = $mansion["id"];
      $this->created_at = new Carbon($mansion["created_at"]);
    }
  }

  function create()
  {
    global $MyPDO;
    $sql = "INSERT INTO mansions (
              title, unit_price, comment, address, access, total_units, birthday,
              birthday_set, floors, architecture, note, private, image1, image2, image3, image4
            )
            VALUES (
              '$this->title', '$this->unit_price', '$this->comment', '$this->address',
              '$this->access', '$this->total_units','$this->birthday', '$this->birthday_set',
              '$this->floors', '$this->architecture', '$this->note', '$this->private',
              '$this->image1', '$this->image2', '$this->image3', '$this->image4'
            )";
    $MyPDO->query($sql);

    return $MyPDO->lastInsertId();
  }

  function save()
  {
    global $MyPDO;
    $sql = "UPDATE mansions
            SET title = '$this->title',
                unit_price = '$this->unit_price',
                comment = '$this->comment',
                address = '$this->address',
                access = '$this->access',
                total_units = '$this->total_units',
                birthday = '$this->birthday',
                birthday_set = '$this->birthday_set',
                floors = '$this->floors',
                architecture = '$this->architecture',
                note = '$this->note',
                private = '$this->private',
                image1 = '$this->image1',
                image2 = '$this->image2',
                image3 = '$this->image3',
                image4 = '$this->image4'
            WHERE id = $this->id";
    return $MyPDO->query($sql);
  }

  function delete()
  {
    global $MyPDO;
    return $MyPDO->query("DELETE FROM mansions WHERE id = $this->id");
  }
}

?>