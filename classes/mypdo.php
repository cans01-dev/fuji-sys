<?php 

require './classes/mansion.php';

class MyPDO extends PDO
{
  function getMansions($address, $freeword, $order="", $limit=0, $offset=0, $count=false) {
    if ($order == "latest") {
      $order_sql = "ORDER BY created_at";
    } elseif ($order == "price") {
      $order_sql = "ORDER BY unit_price";
    } elseif ($order == "price-desc") {
      $order_sql = "ORDER BY unit_price DESC";
    } else {
      $order_sql = "";
    }
    
    if ($address && !$freeword) {
      $where_sql = "WHERE address LIKE '%{$address}%'";
    } elseif (!$address && $freeword) {
      $where_sql = "WHERE CONCAT(address, access, IFNULL(note, '')) LIKE '%{$freeword}%'";
    } elseif ($address && $freeword) {
      $where_sql = "WHERE address LIKE '%{$address}%' AND CONCAT(address, access, IFNULL(note, '')) LIKE '%{$freeword}%'";
    } else {
      $where_sql = "";
    }
    
    if ($count) {
      $sql = "SELECT COUNT(*) FROM mansions $where_sql";
      return self::query($sql)->fetchColumn();
    } else {
      $sql = "SELECT * FROM mansions $where_sql $order_sql LIMIT $limit OFFSET $offset";
      $mansions = array_map('to_class_object', self::query($sql)->fetchAll());
      return $mansions; // to_class_object()->functions.php
    }
  }
}



?>