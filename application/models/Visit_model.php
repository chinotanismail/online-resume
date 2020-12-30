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

  // public function get_by_date_visit(){
  //   return $this->db->select("date_format(date(date_visit), '%d-%b') AS date_visit, COUNT(*) AS count")->from($this->_table)->group_by("date_format(date(date_visit), '%d-%b')")->order_by("CAST(date_visit as datetime) ASC")->get()->result();
  // }

  public function get_by_date_visit(){
    $date_raw = date("r");
    $query  =   "SET @date_min := '".date('Y-m-d', strtotime('-14 day', strtotime($date_raw)))."', @date_max := '".date('Y-m-d', strtotime($date_raw))."'";
    $this->db->query($query);

    $new_query  =   "
      SELECT
      date_generator.date as the_date,
      IFNULL(COUNT(".$this->_table.".device), 0) as count
      FROM (
      select DATE_ADD(@date_min, INTERVAL (@i:=@i+1)-1 DAY) as `date`
      from information_schema.columns,(SELECT @i:=0) gen_sub
      where DATE_ADD(@date_min,INTERVAL @i DAY) BETWEEN @date_min AND @date_max
      ) date_generator
      left join `".$this->_table."` on DATE(date_visit) = date_generator.date
      GROUP BY date;";

    return $this->db->query($new_query)->result();
  }
}
