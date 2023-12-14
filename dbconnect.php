<?php 

try {
  $dsn = 'mysql:dbname=fuji-sys;host=localhost';
  $user = 'root';
  $password = '';
  $pdo = new PDO($dsn, $user, $password);

} catch (PDOException $e) {
  $err_msg = $e->getMessage();
  exit($err_msg);
}

?>