<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Word_model extends CI_Model {
  private $_table = "tbl_word";

  public $id;
  public $word;
  public $date;

  public function save($word_here)
  {
    $this->word = $word_here;
    return $this->db->insert($this->_table, $this);
  }

  public function get_words(){
    return $this->db->order_by("date", "DESC")->limit(20)->get($this->_table)->result();
  }

  public function delete_word($id){
    return $this->db->delete($this->_table, array("id"=>$id));
  }
}
