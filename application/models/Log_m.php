<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Log_m extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	function save($data) {
      $this->db->insert('tx_log', $data);
   }

   // function check_logid() {
   //   $sql01 = "select max(LOG_ID) as max from USER_LOG";
   //   $rs01 = $this->db->query($sql01);
   //   $cek  = $rs01->num_rows();
   //      if ($cek==0) {
   //          $nomor = 1;
   //      } else {
   //          $dt01 = $rs01->row_array();
   //          $no_old  = trim($dt01['MAX']);
   //          $nomor = $no_old+1;
   //       }
   //      return $nomor;
   // }
}	

/* End of file Log_m.php */
/* Location: ./application/models */