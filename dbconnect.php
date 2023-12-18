<?php 

require __DIR__.'/classes/mypdo.php';

try {
  $dsn = 'mysql:dbname=fuji-sys;host=localhost';
  $user = 'root';
  $password = '';
  $MyPDO = new MyPDO($dsn, $user, $password);

} catch (PDOException $e) {
  $err_msg = $e->getMessage();
  exit($err_msg);
}

?>