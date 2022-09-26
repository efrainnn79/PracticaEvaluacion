<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ventas_model extends CI_ModeL {


  public function lista()
    {
        $this->db->select('*');
        $this->db->from('vwventas');
        return $this->db->get();
    }


  
}
