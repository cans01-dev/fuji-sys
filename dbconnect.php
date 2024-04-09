<?php 

require __DIR__.'/classes/mypdo.php';

try {
  $dsn = 'mysql:dbname=mseg12_nakamuradb;host=localhost';
  $user = 'root';
  $password = 'cans555-';
  $MyPDO = new MyPDO($dsn, $user, $password);
  
  // 本番環境
  // $dsn = 'mysql:dbname=mseg12_nakamuradb;host=localhost';
  // $user = 'mseg12_nakamura';
  // $password = '4dxT.XCJ.LZ7ybW';
  // $MyPDO = new MyPDO($dsn, $user, $password);

} catch (PDOException $e) {
  $err_msg = $e->getMessage();
  exit($err_msg);
}

?>