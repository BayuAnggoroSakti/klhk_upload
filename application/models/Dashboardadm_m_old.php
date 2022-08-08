<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboardadm_m extends CI_Model {

	var $table = "v_biodata_os";

   var $column_order = array(null, 'biodata_id', 'biodata_mitraos_id', 'biodata_kode', 'biodata_nik', 'biodata_nama', 'biodata_tempat_lahir',  'biodata_tanggal_lahir', 'biodata_propinsi_id', 'biodata_kabupaten_id', 'biodata_kecamatan_id', 'biodata_kelurahan_id', 'biodata_rw', 'biodata_rt', 'biodata_alamat', 'biodata_jenis_kelamin', 'biodata_agama',  'biodata_nohp1', 'biodata_nohp2', 'biodata_pendidikan', 'biodata_sekolah', 'biodata_jurusan', 'biodata_status', 'biodata_create', 'mitraos_kode', 'mitraos_nama', 'provinsi_nama', 'kabupaten_nama', 'kecamatan_nama', 'desa_nama', 'sekolah_nama', 'jurusan_nama'); 
   var $column_search = array('biodata_nik', 'biodata_nama', 'biodata_tanggal_lahir', 'biodata_alamat', 'biodata_jenis_kelamin', 'biodata_agama', 'biodata_nohp1', 'biodata_nohp2', 'biodata_pendidikan', 'mitraos_nama', 'provinsi_nama', 'kabupaten_nama', 'kecamatan_nama', 'desa_nama', 'sekolah_nama', 'jurusan_nama'); 

   var $order = array('biodata_create' => 'desc', 'mitraos_nama' => 'asc'); // default order     

   public function __construct() {
      parent::__construct();
    }

   private function _get_datatables_query()
    {
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

    function get_tot_os_all($thn) {
         $this->db->from('tx_biodata_os');                 
         $this->db->where('year(biodata_create)', $thn);                 
         return $this->db->count_all_results();
    }

    function get_tot_os_umum($thn) {
        $this->db->from('tx_biodata_os');        
        $this->db->where('biodata_mitraos_id', '1');
        $this->db->where('year(biodata_create)', $thn);                 

        return $this->db->count_all_results();
    }
    function get_tot_os_koperasi($thn) {
        $this->db->from('tx_biodata_os'); 
        $this->db->where('biodata_mitraos_id', '2');       
        $this->db->where('year(biodata_create)', $thn);                 

        return $this->db->count_all_results();
    }
    function get_tot_os_cakap($thn) {
        $this->db->from('tx_biodata_os'); 
        $this->db->where('biodata_mitraos_id', '3');              
        $this->db->where('year(biodata_create)', $thn);                 

        return $this->db->count_all_results();
    }
    
    // function get_tot_os_koperasi() {
    //     $this->db->select_sum('jum_stock');
    //     return $this->db->get('tbl_stock_akhir')->result();
    // }


}	

/* End of file Dashboardadm_m.php */
/* Location: ./application/models */