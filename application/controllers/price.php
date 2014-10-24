<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Price extends CI_Controller {
  function getPriceData()
  {
    $query = $this->db->query("SELECT * FROM price ORDER BY id ASC");
    $res = [];
    foreach ($query->result() as $row)
    {
      $obj = new stdClass();
      $obj->name = $row->name;
      $obj->price = $row->price;
      $res["uuid_".$row->id] = $obj;
    }
    echo 'var dataset = '.json_encode($res);
  }
}