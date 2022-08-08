<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboardhr_m extends CI_Model {

    // var $table = 'v_biodata_os_test';

    // var $column_order = array(null, 'biodata_id', 'mitraos_nama', 'biodata_nik', 'biodata_nama', 'biodata_alamat', 'biodata_jenis_kelamin', 'biodata_tempat_lahir', 'biodata_tanggal_lahir', 'biodata_pendidikan', 'biodata_create', 'biodata_update', 'biodata_status'); 
    // var $column_search = array('biodata_nama','biodata_nik'); 
    // var $order = array('biodata_create' => 'desc'); // default order 
    var $table = 'tx_biodata_os';

    var $column_order = array(null, 'biodata_id', 'biodata_nik', 'biodata_nama', 'biodata_alamat', 'biodata_tempat_lahir', 'biodata_tanggal_lahir', 'biodata_pendidikan', 'biodata_create', 'biodata_status','biodata_jenis_kelamin'); 
    var $column_search = array('biodata_alamat','biodata_nama','biodata_nik','biodata_status'); 
    var $order = array('biodata_create' => 'desc', 'biodata_update' => 'desc');
	function __construct() {
		parent::__construct();
	}

 	private function _get_datatables_query_koperasi() {

        $this->db->from($this->table);
        $mitraos = $this->session->userdata('mitraos');
 		$this->db->where('YEAR(biodata_create)',date('Y'));
 		$this->db->where('MONTH(biodata_create)',date('m'));
 		$this->db->where('biodata_mitraos_id','1');
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
 
    function get_datatables_koperasi()
    {
        $this->_get_datatables_query_koperasi();
        if($_POST['length'] != -1) {
        	$this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered_koperasi()
    {
        $this->_get_datatables_query_koperasi();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    function count_all_koperasi()
    {
        $this->db->from($this->table);
           $mitraos = $this->session->userdata('mitraos');
 		$this->db->where('YEAR(biodata_create)',date('y'));
 		$this->db->where('MONTH(biodata_create)',date('m'));
 		$this->db->where('biodata_mitraos_id','1');
 		$this->db->where('biodata_kode !=','');
        return $this->db->count_all_results();
    }
 
 private function _get_datatables_query_umum() {

        $this->db->from($this->table);
        $mitraos = $this->session->userdata('mitraos');
 		$this->db->where('YEAR(biodata_create)',date('Y'));
 		$this->db->where('MONTH(biodata_create)',date('m'));
 		$this->db->where('biodata_kode','');

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
 
    function get_datatables_umum()
    {
        $this->_get_datatables_query_umum();
        if($_POST['length'] != -1) {
        	$this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered_umum()
    {
        $this->_get_datatables_query_umum();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    function count_all_umum()
    {
        $this->db->from($this->table);
           $mitraos = $this->session->userdata('mitraos');
 		$this->db->where('YEAR(biodata_create)',date('y'));
 		$this->db->where('MONTH(biodata_create)',date('m'));
 		$this->db->where('biodata_kode','');
        return $this->db->count_all_results();
    }
 
 private function _get_datatables_query_cakap() {

        $this->db->from($this->table);
        $mitraos = $this->session->userdata('mitraos');
 		$this->db->where('YEAR(biodata_create)',date('Y'));
 		$this->db->where('MONTH(biodata_create)',date('m'));
 		$this->db->where('biodata_mitraos_id','2');
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
 
    function get_datatables_cakap()
    {
        $this->_get_datatables_query_cakap();
        if($_POST['length'] != -1) {
        	$this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered_cakap()
    {
        $this->_get_datatables_query_cakap();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    function count_all_cakap()
    {
        $this->db->from($this->table);
           $mitraos = $this->session->userdata('mitraos');
 		$this->db->where('YEAR(biodata_create)',date('y'));
 		$this->db->where('MONTH(biodata_create)',date('m'));
 		$this->db->where('biodata_mitraos_id','2');
 		$this->db->where('biodata_kode !=','');
        return $this->db->count_all_results();
    }
 

}

/* End of file M_user.php */
/* Location: ./application/models/sadmin/ */    