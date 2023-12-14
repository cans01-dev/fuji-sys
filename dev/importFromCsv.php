<?php
require '../vendor/autoload.php';
require '../dbconnect.php';

// $client = new Google\Client();
// $client->setAuthConfig('C:\xampp\htdocs\projects\fuji-sys\dev\fuji-sys-38daa355c5b9.json');
// $client->addScope(Google\Service\Drive::DRIVE);
// $service = new Google_Service_Drive($client);

// $fileId = "0BwwA4oUTeiV1UVNwOHItT0xfa2M";
// $response = $service->files->get($fileId,[
//   "alt" => "media"
// ]);

$pdo->query("DELETE FROM mansions; ALTER TABLE mansions auto_increment = 1;");

$fileIdArray = [];
$f = fopen('C:\xampp\htdocs\projects\fuji-sys\dev\mansions.csv', 'r');

$sql = "INSERT INTO mansions (title, address, access, total_units, birthday, floors, architecture, image_path, unit_price)
        VALUES ";

while ($line = fgetcsv($f)) {
  $title = $line[1];
  $address = $line[2];
  $access = $line[5];
  $total_units = $line[6];
  $birthday = date('Y-m-d', strtotime($line[9].'/1'));
  $floors = $line[7];
  $architecture = $line[8];
  $image_path = $line[13];
  $unit_price = $line[18];

  echo var_dump(['title' => $title,'address' => $address,'access' => $access,'total_units' => $total_units,'birthday' => $birthday,'floors' => $floors,'architecture' => $architecture,'image_path' => $image_path,'unit_price' => $unit_price]);
  echo "\n";

  $sql .= "('$title', '$address', '$access', '$total_units', '$birthday', '$floors', '$architecture', '$image_path', '$unit_price'),";

  // $url = $line[13];
  // if (filter_var($url, FILTER_VALIDATE_URL)) {
  //   $params;
  //   parse_str(parse_url($url)['query'], $params);
  // }
}

fclose($f);

$pdo->query(rtrim($sql, ','));

?>