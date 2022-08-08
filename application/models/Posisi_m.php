<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Posisi_m extends CI_Model {

    var $table = 'tx_posisi';

    var $column_order = array(null, 'posisi_id', 'posisi_nama', 'posisi_update','posisi_create'); 
    var $column_search = array('posisi_nama'); 
    var $order = array('posisi_update' => 'asc', 'posisi_nama' => 'asc'); // default order 

	function __construct() {
		parent::__construct();
	}

 	private function _get_datatables_query() {

        $this->db->from($this->table);
 
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
        return $this->db->count_all_results();
    }

   function get_posisi($posisi) {
      $this->db->from($this->table);
      $this->db->where('posisi_nama', $posisi);

      return $this->db->get();
   }

   function get_posisiid($uid) {
      $this->db->where('posisi_id', $uid);
      return $this->db->get($this->table);
   }

   function save_posisi($data) {
       $this->db->insert('tx_posisi', $data);
   }

   function update_posisi($id, $data) {
      $this->db->where('posisi_id', $id);
      $this->db->update('tx_posisi', $data);
      return TRUE;  
   } 

   function delete_posisi($id) {
      $this->db->where('posisi_id', $id);
      $this->db->delete('tx_posisi');
      return TRUE;    
   }

}

/* End of file M_user.php */
/* Location: ./application/models/sadmin/ */    