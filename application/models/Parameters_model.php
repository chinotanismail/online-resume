<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Parameters_model extends CI_Model {
  private $_table = "tbl_parameters";

  public $id;
  public $cd;
  public $value;

  public function save($value, $parameter)
  {
    $data = array(
      'value' => $value
    );
    return $this->db->update($this->_table, $data, array("cd"=>$parameter));
  }

  public function get_parameter($cd){
    return $this->db->get_where($this->_table, array("cd"=>$cd))->result();
  }
}
