<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dataos_m extends CI_Model {

    var $table = 'v_biodata_os_test';

    var $column_order = array(null, 'biodata_id', 'mitraos_nama', 'biodata_nik', 'biodata_nama', 'biodata_alamat', 'biodata_jenis_kelamin', 'biodata_tempat_lahir', 'biodata_tanggal_lahir', 'biodata_pendidikan', 'biodata_create', 'biodata_update', 'biodata_status','test_hasil'); 
    var $column_search = array('mitraos_nama','biodata_nama','biodata_nik'); 
    var $order = array('biodata_create' => 'desc', 'biodata_update' => 'desc'); // default order 

	function __construct() {
		parent::__construct();
	}

 	private function _get_datatables_query() {

        $this->db->from($this->table);
         $this->db->where('biodata_kode !=','');
        $i = 0;     
        foreach ($this->column_search as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                 
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
 
    function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1) {
        	$this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    function count_all()
    {
        $this->db->from($this->table);
         $this->db->where('biodata_kode !=','');
        return $this->db->count_all_results();
    }

   function get_dataosid($uid) {
      $this->db->where('biodata_id', $uid);
      return $this->db->get($this->table);
   }

   function get_datatestid($uid) {
      $this->db->where('test_id', $uid);
      return $this->db->get('tx_test');
   }

   private function _get_datatables_query_os() {

        $this->db->from($this->table);
        $this->db->where('biodata_mitraos_id', $this->session->userdata('mitraos'));
        $this->db->where('biodata_kode !=','');
        $i = 0;     
        foreach ($this->column_search as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                 
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
 
    function get_datatables_os()
    {
        $this->_get_datatables_query_os();
        if($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered_os()
    {
        $this->_get_datatables_query_os();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    function count_all_os()
    {
        $this->db->from($this->table);
        $this->db->where('biodata_mitraos_id', $this->session->userdata('mitraos'));
        $this->db->where('biodata_kode !=','');
        return $this->db->count_all_results();
    }

    function delete_dataos($id) {
      $this->db->where('biodata_id', $id);
      $this->db->delete('tx_biodata_os');
      return TRUE;    
   }

    function delete_datatest($id) {
      $this->db->where('test_id', $id);
      $this->db->delete('tx_test');
      return TRUE;    
   }

   function delete_datatest_biodataid($id) {
      $this->db->where('biodata_id', $id);
      $this->db->delete('tx_test');
      return TRUE;    
   }


}

/* End of file M_user.php */
/* Location: ./application/models/sadmin/ */    