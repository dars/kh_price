<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
use Mailgun\Mailgun;
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

  function mail()
  {
    echo '<pre>';
    var_dump($_POST);

    $mg = new Mailgun("key-46zwn5szwtn-et5do8ldgbhfixqninp4");
    $domain = "sandbox1331.mailgun.org";

    # Now, compose and send your message.
    $mg->sendMessage($domain, array('from'    => 'service@sandbox1331.mailgun.org',
                                    'to'      => 'dars94@gmail.com',
                                    'subject' => 'The PHP SDK is awesome!',
                                    'text'    => 'It is so simple to send a message.'));
  }
}