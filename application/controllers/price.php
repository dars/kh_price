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
    $res = $this->db->query("SELECT * FROM price");
    $index = array();
    foreach($res->result() as $row){
      $index[$row->id] = $row->name;
      $price[$row->id] = $row->price;
    }
    $text = '';
    switch($_POST['kind']){
      case 1:
        $text .= '<h1>聖誕關西╳戀戀雙人行</h1>';
        break;
      case 2:
        $text .= '<h1>暢遊四都╳行程自由選 女孩們的獨享旅行</h1>';
        break;
      case 3:
        $text .= '<h1>古蹟巡禮╳關西自由行 女孩們的朝聖小旅行</h1>';
        break;
      case 4:
        $text .= '<h1>合掌村點燈╳東西自由行 女孩們的冬日童話遊</h1>';
        break;
      case 5:
        $text .= '<h1>購物天堂╳美食輕鬆享 女孩們的充電小旅行</h1>';
        break;
    }
    $data = new stdClass();
    $data->kind = $_POST['kind'];
    $data->name = $_POST['name'];
    $text .= $_POST['name']."<br>";
    $data->email = $_POST['email'];
    $text .= $_POST['email']."<br>";
    $data->tel = $_POST['tel'];
    $text .= $_POST['tel']."<br>";
    $data->hotel = array();

    if(@$_POST['airline']){
      $data->airline = $index[$_POST['airline']];
      $data->airline_id = $_POST['airline'];
      $data->airline_price = $price[$_POST['airline']];
      $text .= $index[$_POST['airline']]."<br>";
    }
    if(@$_POST['tour']){
      $data->tour = array();
      $data->tour_id = array();
      $data->tour_price = array();
      $text .= '<br>行程：<br>';
      foreach(@$_POST['tour'] as $t){
        array_push($data->tour, $index[$t]);
        array_push($data->tour_id, $t);
        array_push($data->tour_price, $price[$t]);
        $text .= '&nbsp;&nbsp;'.$index[$t]."<br>";
      }
    }
    if(@$_POST['hotel_1']){
      $text .= '<br>住宿飯店：<br>';
      $tmp = array(
        'name' => $index[$_POST['hotel_opts_1']],
        'day'  => $_POST['day_1'],
        'id'   => $_POST['hotel_opts_1'],
        'price' => $price[$_POST['hotel_opts_1']]
      );
      $text .= '&nbsp;&nbsp;'.$index[$_POST['hotel_opts_1']]." x ".$_POST['day_1']."日<br>";
      array_push($data->hotel, $tmp);
    }
    if(@$_POST['hotel_2']){
      $tmp = array(
        'name' => $index[$_POST['hotel_opts_2']],
        'day'  => $_POST['day_2'],
        'id'   => $_POST['hotel_opts_2'],
        'price' => $price[$_POST['hotel_opts_2']]
      );
      $text .= '&nbsp;&nbsp;'.$index[$_POST['hotel_opts_2']]." x ".$_POST['day_2']."日<br>";
      array_push($data->hotel, $tmp);
    }
    if(@$_POST['hotel_3']){
      $tmp = array(
        'name' => $index[$_POST['hotel_opts_3']],
        'day'  => $_POST['day_3'],
        'id'   => $_POST['hotel_opts_3'],
        'price' => $price[$_POST['hotel_opts_3']]
      );
      $text .= '&nbsp;&nbsp;'.$index[$_POST['hotel_opts_3']]." x ".$_POST['day_3']."日<br>";
      array_push($data->hotel, $tmp);
    }
    if(@$_POST['hotel_4']){
      $tmp = array(
        'name' => $index[$_POST['hotel_opts_4']],
        'day'  => $_POST['day_4'],
        'id'   => $_POST['hotel_opts_4'],
        'price' => $price[$_POST['hotel_opts_4']]
      );
      $text .= '&nbsp;&nbsp;'.$index[$_POST['hotel_opts_4']]." x ".$_POST['day_4']."日<br>";
      array_push($data->hotel, $tmp);
    }
    if(@$_POST['plus_1']){
      $tmp = array(
        'name' => 'KANNSAI THRU PASS 關西周遊券',
        'id' => $_POST['plus_day'],
        'price' => $price[$_POST['plus_day']]
      );
      $text .= '<br>KANNSAI THRU PASS 關西周遊券';
      if($_POST['plus_day'] == '65'){
        $tmp['day'] = 3;
        $text .= ' 3日<br>';
      }else{
        $tmp['day'] = 2;
        $text .= ' 2日<br>';
      }
      $data->plus = $tmp;
    }
    if(@$_POST['ticket']){
      $data->ticket = $index[$_POST['ticket']];
      $data->ticket_id = $_POST['ticket'];
      $data->ticket_price = $price[$_POST['ticket']];
      $text .= '<br>'.$index[$_POST['ticket']];
    }

    $this->db->set('name', $_POST['name']);
    $this->db->set('kind', $_POST['kind']);
    $this->db->set('tel', $_POST['tel']);
    $this->db->set('email', $_POST['email']);
    $this->db->set('row_data', json_encode($data));
    $this->db->set('created_at', date('Y-m-d H:i:s'));
    $this->db->set('updated_at', date('Y-m-d H:i:s'));
    $this->db->insert('price_logs');

    $mg = new Mailgun("key-46zwn5szwtn-et5do8ldgbhfixqninp4");
    $domain = "sandbox1331.mailgun.org";

    # Now, compose and send your message.
    $mg->sendMessage($domain, array('from'    => 'service@sandbox1331.mailgun.org',
                                    'to'      => 'dars94@gmail.com',
                                    'subject' => '線上行程價錢試算 #'.$this->db->insert_id().' '.date('Y-m-d H:i:s'),
                                    'text'    => $text,
                                    'html'    => $text));
  }
}