<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dataumum_m extends CI_Model {
    
    var $table = 'V_LAMARAN_KERJA';

    var $column_order = array( 'ID_LAMARAN', 'NAMA', 'ALAMAT', 'JNS_KELAMIN', 'TEMPAT_LAHIR', 'D_LAHIR', 'PENDIDIKAN', 'D_ADMIN', 'LAST_UPDATE', 'STATUS','HASIL'); 
    var $column_search = array('NAMA'); 
    var $order = array('D_ADMIN' => 'desc'); // default order 

	function __construct() {

		parent::__construct();
        $this->db->close();
        $config['hostname'] = '192.168.0.80:1521/ORCSISDM';
        $config['username'] = 'recruitment';
        $config['password'] = 'rahasiarec';
        $config['database'] = 'RECRUITMENT';
        $config['dbdriver'] = 'oci8';
        $config['dbprefix'] = '';
        $config['pconnect'] = FALSE;
        $config['db_debug'] = TRUE;
        $config['cache_on'] = FALSE;
        $config['cachedir'] = '';
        $config['char_set'] = 'utf8';
        $config['dbcollat'] = 'utf8_general_ci';
        $this->load->database($config);

	}

 	private function _get_datatables_query() {
        
        //$db2 = $this->load->database('database_kedua', TRUE);
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
        
         //$db2 = $this->load->database('database_kedua', TRUE);
        $this->_get_datatables_query();
        if($_POST['length'] != -1) {
        	$this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        //print_r($query);
        return $query->result();
    }
 
    function count_filtered()
    {
        
        // $db2 = $this->load->database('database_kedua', TRUE);
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    function count_all()
    {

         //$db2 = $this->load->database('database_kedua', TRUE);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }


}

/* End of file M_user.php */
/* Location: ./application/models/sadmin/ */    