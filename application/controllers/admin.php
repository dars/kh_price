<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
  function index()
  {
    $this->parser->parse('admin/index', $data = array());
  }
}