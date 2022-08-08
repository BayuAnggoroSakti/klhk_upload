<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report_m extends CI_Model {

	function __construct() {
		parent::__construct();
	}

   function proc_tmp_tabel($tgl, $kdbrg, $file) {
      $sql  = "CALL SP_GET_DATA_REF(?,?,?)";
      $data = array('vtanggal_char' => $tgl, 'vkode_barang' => $kdbrg, 'vnama_file' => $file);
         $result = $this->db->query($sql, $data);
         if ($result !== NULL) {
             return TRUE;
         }
         return FALSE;
   }   

   function get_header($table) {
      
      //$this->db->select('*');
      $this->db->select('COLUMN_NAME, COLUMN_ID');      
      $this->db->where('TABLE_NAME', $table);
      $this->db->order_by('COLUMN_ID', 'ASC');

      return $this->db->get('USER_TAB_COLUMNS')->result();
   }

   function view_tmp_header($table) {
      $sql = $this->db->query("select * FROM ".$table);
      return $sql->result();
   } 

   function view_tmp_row($table) {

      $sql = $this->db->query("select rownum, t.* from ".$table." t");
      //$sql = $this->db->query("select * FROM ".$table);
      return $sql->result();
   } 

   
   function get_param($userid, $param1, $param2, $param3) {
      //cek 

      $param = array('USER_ID' => $userid, 'PARAM_TGL' => $param1, 'PARAM_KDBRG' => $param2);
      $results = $this->db->get_where('USER_PARAM',$param)->result();
      if (count($results)>0) {
         foreach ($results as $r) {
            $nmtabel = trim($r->PARAM_FILE);
            $h_nmtabel = 'H_'.$nmtabel;
            $r_nmtabel = 'R_'.$nmtabel;
         }
         $results = $this->get_header($h_nmtabel);
         if (count($results)>0) {
            $this->db->query("DROP TABLE ".$h_nmtabel."");
            $this->db->query("DROP TABLE ".$r_nmtabel."");
         }   
         //update
         $data = array(
           'PARAM_FILE'    => $param3  
         );
         $this->db->where('USER_ID', $userid);
         $this->db->where('PARAM_TGL', $param1);
         $this->db->where('PARAM_KDBRG', $param2);
         $results = $this->db->update('USER_PARAM', $data);
         return $results; 
      } else {
         $data = array(
           'USER_ID'       => $userid,
           'PARAM_TGL'     => $param1,
           'PARAM_KDBRG'   => $param2,
           'PARAM_FILE'    => $param3  
         );
         $results = $this->db->insert('USER_PARAM', $data);
         return $results; 
      }      
   }
}	

/* End of file report_m.php */
/* Location: ./application/models */