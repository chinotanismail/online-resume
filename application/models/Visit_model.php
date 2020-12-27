<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Visit_model extends CI_Model {
  private $_table = "tbl_visit";

  public $id;
  public $device;
  public $date_visit;

  public function save($device)
  {
    $this->device = $device;
    return $this->db->insert($this->_table, $this);
  }

  public function get_all_views()
  {
    return $this->db->get($this->_table)->result();
  }

  public function get_by_date_visit(){
    return $this->db->select("date_format(date(date_visit), '%d-%b') AS date_visit, COUNT(*) AS count")->from($this->_table)->group_by("date_format(date(date_visit), '%d-%b')")->order_by("CAST(date_visit as datetime) ASC")->get()->result();
  }
}
