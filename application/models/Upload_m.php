<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Upload_m extends CI_Model {

    var $table = 'v_upload';

    var $column_order = array(null); 
    var $column_search = array('username_hr','username_hr', 'status', 'jumlah_data'); 
    var $order = array('datetime_insert' => 'desc'); // default order 

	function __construct() {
		parent::__construct();
	}

 	private function _get_datatables_query() {
        if ($this->session->userdata('mitraos') == '') {
             $this->db->from($this->table);
             $this->db->where('status !=',0);
        } else {
            $this->db->from($this->table);
            $this->db->where('mitraos_id',$this->session->userdata('mitraos'));
        }
        
       
 
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
        if ($this->session->userdata('mitraos') == '') {
             $this->db->from($this->table);
             $this->db->where('status !=',0);
        } else {
            $this->db->from($this->table);
            $this->db->where('mitraos_id',$this->session->userdata('mitraos'));
        }
        return $this->db->count_all_results();
    }

 

}

/* End of file M_user.php */
/* Location: ./application/models/sadmin/ */    