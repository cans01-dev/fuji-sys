<?php

require './vendor/autoload.php';

use Carbon\Carbon;
Carbon::setLocale('ja');

class Mansion
{
  public $id, $title, $unit_price, $comment, $address, $access, $total_units, $birthday, $floors, $architecture, $note;

  function __construct($mansion)
  {
    $this->id = $mansion["id"];
    $this->title = $mansion["title"];
    $this->unit_price = $mansion["unit_price"];
    $this->comment = $mansion["comment"];
    $this->address = $mansion["address"];
    $this->access = $mansion["access"];
    $this->total_units = $mansion["total_units"];
    $this->birthday = new Carbon($mansion["birthday"]);
    $this->floors = $mansion["floors"];
    $this->architecture = $mansion["architecture"];
    $this->note = $mansion["note"];
  }
}

?>