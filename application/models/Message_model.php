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
    return $this->db->select("date_format(date(date_received), '%d-%b') AS date_received, COUNT(*) AS count")->from($this->_table)->group_by("date_format(date(date_received), '%d-%b')")->order_by("CAST(date_received as datetime) ASC")->get()->result();
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
