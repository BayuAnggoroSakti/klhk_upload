<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Request_vendor_m extends CI_Model {

    var $table = 'v_kirim_vendor';

    var $column_order = array(null, 'status', 'kirim_vendor_create','nik','nama','catatan_hr','catatan_vendor','status','kirim_vendor_create'); 
    var $column_search = array('nik','nama','mitraos_nama'); 
    var $order = array('kirim_vendor_create' => 'desc'); // default order 

	function __construct() {
		parent::__construct();
	}

 	private function _get_datatables_query() {
        if($this->input->post('tanggal_awal') && $this->input->post('tanggal_akhir'))
        {
            $tgl_awal = $this->input->post('tanggal_awal','true');
            $tgl_akhir =$this->input->post('tanggal_akhir','true');
            $tgl_awal_format = substr($tgl_awal,6,4).'-'.substr($tgl_awal,3,2).'-'.substr($tgl_awal,0,2).' 00:00:00';
            $tgl_akhir_format = substr($tgl_akhir,6,4).'-'.substr($tgl_akhir,3,2).'-'.substr($tgl_akhir,0,2).' 23:59:59';
            $this->db->where('kirim_vendor_create >=',$tgl_awal_format );
            $this->db->where('kirim_vendor_create <=',$tgl_akhir_format);
        }
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

   function get_kirim_vendor($kirim_vendor) {
      $this->db->from($this->table);
      $this->db->where('kirim_vendor_nama', $kirim_vendor);

      return $this->db->get();
   }

   function get_kirim_vendorid($uid) {
      $this->db->where('kirim_vendor_id', $uid);
      return $this->db->get($this->table);
   }

   function save_kirim_vendor($data) {
       $this->db->insert('tx_kirim_vendor', $data);
   }

   function update_kirim_vendor($id, $data) {
      $this->db->where('kirim_vendor_id', $id);
      $this->db->update('tx_kirim_vendor', $data);
      return TRUE;  
   } 

   function delete_kirim_vendor($id) {
      $this->db->where('kirim_vendor_id', $id);
      $this->db->delete('tx_kirim_vendor');
      return TRUE;    
   }

   private function _get_datatables_query_os() {

        $this->db->from($this->table);
        $this->db->where('user_id', $this->session->userdata('userid'));
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
           $this->db->where('user_id', $this->session->userdata('userid'));
        return $this->db->count_all_results();
    }

}

/* End of file M_user.php */
/* Location: ./application/models/sadmin/ */    