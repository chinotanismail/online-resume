<?php defined('BASEPATH') OR exit('No direct script access allowed');
define("MESSAGE_STATUS_UNREAD", 0);
define("MESSAGE_STATUS_READ", 1);
define("MESSAGE_STATUS_DELETED", 2);
define("CV_NOT_SENT", "0");
define("CV_SENT", "1");
define("CV_REQUESTED", "Y");
define("CV_NOT_REQUESTED", "N");
class Message_model extends CI_Model {
  private $_table = "tbl_message";

  public $id;
  public $date_received;
  public $name;
  public $email_address;
  public $message;
  public $message_status;
  public $cv_request;
  public $cv_sent;

  public function save($data)
  {
    $this->name = $data['name'];
    $this->email_address = $data['email_address'];
    $this->cv_request = $data['cv_request'];
    $this->message = $data['message'];
    $this->cv_sent = CV_NOT_SENT;
    $this->message_status = MESSAGE_STATUS_UNREAD;

    return $this->db->insert($this->_table, $this);
  }

  public function get_messages()
  {
    return $this->db->order_by("date_received", "DESC")->get_where($this->_table, "message_status = 0 OR message_status = 1")->result();
  }

  public function set_read($id)
  {
    $data = array(
      'message_status' => MESSAGE_STATUS_READ
    );

    return $this->db->update($this->_table, $data, array('id' => $id));
  }

  public function set_delete($id)
  {
    $data = array(
      'message_status' => MESSAGE_STATUS_DELETED
    );

    return $this->db->update($this->_table, $data, array('id' => $id));
  }

  public function get_unread_message_count()
  {
    return $this->db->get_where($this->_table, array("message_status"=>"0"))->num_rows();
  }

  public function get_by_date_message()
  {
    $date_raw = date("r");
    $query  =   "SET @date_min := '".date('Y-m-d', strtotime('-14 day', strtotime($date_raw)))."', @date_max := '".date('Y-m-d', strtotime($date_raw))."'";
    $this->db->query($query);

    $new_query  =   "
      SELECT
      date_generator.date as the_date,
      IFNULL(COUNT(".$this->_table.".date_received), 0) as count
      FROM (
      select DATE_ADD(@date_min, INTERVAL (@i:=@i+1)-1 DAY) as `date`
      from information_schema.columns,(SELECT @i:=0) gen_sub
      where DATE_ADD(@date_min,INTERVAL @i DAY) BETWEEN @date_min AND @date_max
      ) date_generator
      left join `".$this->_table."` on DATE(date_received) = date_generator.date
      GROUP BY date;";

    return $this->db->query($new_query)->result();
  }

  public function set_cv_sent($id)
  {
    $data = array(
      'cv_sent' => CV_SENT
    );
    return $this->db->update($this->_table, $data, array('id' => $id));
  }

  public function get_message($id)
  {
    return $this->db->get_where($this->_table, array("id"=>$id))->row();
  }
}
