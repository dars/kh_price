<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
  function login(){
    $this->parser->parse('admin/login', array());
  }
  function doLogin(){
    if($_POST['account'] == 'admin@knt-taiwan.com' && sha1(md5($_POST['password'])) == '33a494aa359716544b348d096389fe5e85d61828'){
      $this->session->set_userdata('logger_in', true);
      redirect(substr(base_url(), 0, -1).'?/admin/index', 'refresh');
      exit;
    }
    redirect(substr(base_url(), 0, -1).'?/admin/login', 'refresh');
  }
  function doLogout()
  {
    $this->session->set_userdata('logger_in', false);
    redirect(substr(base_url(), 0, -1).'?/admin/login', 'refresh');
  }
  function index()
  {
    if(!$this->session->userdata('logger_in')){
      redirect(substr(base_url(), 0, -1).'?/admin/login', 'refresh');
    }
    $data = array('results' => array());
    $res = $this->db->query("SELECT * FROM price_logs WHERE readed = false ORDER BY id DESC");
    foreach($res->result() as $row){
      $row->title =  $this->kind_title($row->kind);
      array_push($data['results'], $row);
    }
    $data['count'] = count($data['results']);
    $data['inbox_count'] = $this->db->where('readed = false')->count_all_results('price_logs');
    $data['archive_count'] = $this->db->where('readed = true')->count_all_results('price_logs');
    $this->parser->parse('admin/index', $data);
  }
  function archive()
  {
    if(!$this->session->userdata('logger_in')){
      redirect(substr(base_url(), 0, -1).'?/admin/login', 'refresh');
    }
    $data = array('results' => array());
    $res = $this->db->query("SELECT * FROM price_logs WHERE readed = true ORDER BY id DESC");
    foreach($res->result() as $row){
      $row->title =  $this->kind_title($row->kind);
      array_push($data['results'], $row);
    }
    $data['count'] = count($data['results']);
    $data['inbox_count'] = $this->db->where('readed = false')->count_all_results('price_logs');
    $data['archive_count'] = $this->db->where('readed = true')->count_all_results('price_logs');
    $this->parser->parse('admin/index', $data);
  }

  function set_readed(){
    if(!$this->session->userdata('logger_in')){
      redirect(substr(base_url(), 0, -1).'?/admin/login', 'refresh');
    }
    $this->db->query("UPDATE price_logs SET readed = true, updated_at='".date('Y-m-d H:i:s')."' WHERE id in (".join($_POST['ids'],',').")");
  }

  function set_delete(){
    if(!$this->session->userdata('logger_in')){
      redirect(substr(base_url(), 0, -1).'?/admin/login', 'refresh');
    }
    $this->db->query("DELETE FROM price_logs WHERE id in (".join($_POST['ids'],',').")");
  }

  function view(){
    if(!$this->session->userdata('logger_in')){
      redirect(substr(base_url(), 0, -1).'?/admin/login', 'refresh');
    }
    $data = array();

    $data['inbox_count'] = $this->db->where('readed = false')->count_all_results('price_logs');
    $data['archive_count'] = $this->db->where('readed = true')->count_all_results('price_logs');

    $res = $this->db->where("id", $this->uri->segment(3))->get('price_logs');
    $data['item'] = $res->result_array()[0];
    $data['item']['title'] = $this->kind_title($data['item']['kind']);
    $this->parser->parse('admin/view', $data);
  }

  function kind_title($id){
    switch($id){
      case 1:
        return '聖誕關西╳戀戀雙人行';
        break;
      case 2:
        return '暢遊四都╳行程自由選 女孩們的獨享旅行';
        break;
      case 3:
        return '古蹟巡禮╳關西自由行 女孩們的朝聖小旅行';
        break;
      case 4:
        return '合掌村點燈╳東西自由行 女孩們的冬日童話遊';
        break;
      case 5:
        return '購物天堂╳美食輕鬆享 女孩們的充電小旅行';
        break;
    }
  }
}