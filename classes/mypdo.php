<?php 

require __DIR__.'/mansion.php';

class MyPDO extends PDO
{
  function getMansions($address, $freeword, $order="", $limit=0, $offset=0, $count=false, $includePrivete=false) {
    if ($order == "latest") {
      $order_sql = "ORDER BY created_at DESC";
    } elseif ($order == "price") {
      $order_sql = "ORDER BY unit_price";
    } elseif ($order == "price-desc") {
      $order_sql = "ORDER BY unit_price DESC";
    } elseif ($order == "random") {
      $order_sql = "ORDER BY RAND()";
    } else {
      $order_sql = "";
    }
    
    $address = $address ?? "";
    $freeword = $freeword ?? "";
    $private = $includePrivete ? "(0, 1)" : "(0)";

    $where_sql = "WHERE address LIKE '%{$address}%'
                  AND CONCAT(title, address, access, IFNULL(note, '')) LIKE '%{$freeword}%'
                  AND private IN $private";
    
    if ($count) {
      $sql = "SELECT COUNT(*) FROM mansions $where_sql";
      return self::query($sql)->fetchColumn();
    } else {
      $sql = "SELECT * FROM mansions $where_sql $order_sql LIMIT $limit OFFSET $offset";
      $mansions = array_map('to_class_object', self::query($sql)->fetchAll());
      return $mansions; // to_class_object()->functions.php
    }
  }

  function getMansionById($id, $includePrivete=false) {
    $private = $includePrivete ? "(0, 1)" : "(0)";
    $sql = "SELECT * FROM mansions WHERE id = $id AND private IN $private";
    if ($result = self::query($sql)->fetch()) {
      $mansion = new Mansion();
      $mansion->setAll($result);
      return $mansion;
    } else {
      return false;
    }
  }
}



?>