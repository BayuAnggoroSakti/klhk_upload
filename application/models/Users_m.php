<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users_m extends CI_Model {

    var $table = 'v_users';

    var $column_order = array(null, 'user_id', 'user_username', 'user_name', 'user_level', 'mitraos_id', 'user_status', 'user_online', 'user_create', 'user_login', 'user_logout', 'user_ip', 'mitraos_kode', 'mitraos_nama', 'level_name'); 
    var $column_search = array('user_username', 'user_name', 'level_name'); 
    var $order = array('user_level' => 'asc', 'user_name' => 'asc'); // default order 

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

   function get_username($username) {
      $this->db->from($this->table);
      $this->db->where('user_username', $username);

      return $this->db->get();
   }

   function check_user_account($username, $password) {
      $this->db->from($this->table);
      $this->db->where('user_username', $username);
      $this->db->where('user_password', $password);

      return $this->db->get();
   } 

   function userlogin($userid, $ip) {      
      // $sql = "UPDATE USER_WEB SET USER_LOGIN = sysdate, USER_ONLINE = '1', USER_IP = '$ip' WHERE USER_ID = '$id'"; 
      // $result = $this->db->query($sql);
      // return $result;
      $data = array(
         'user_login'   => date('Y-m-d H:i:s'),
         'user_online'  => '1',
         'user_ip'      => $ip
      );
      $this->db->where('user_id', $userid);
      $this->db->update('tx_user', $data);
      return true;
    }
 
    function userlogout($userid, $ip) {
      // $sql = "UPDATE USER_WEB SET USER_LOGOUT = sysdate, USER_ONLINE = '0', USER_IP = '$ip' WHERE USER_ID = '$id'"; 
      // $result = $this->db->query($sql);
      // return $result;
       $data = array(
         'user_logout'  => date('Y-m-d H:i:s'),
         'user_online'  => '0',
         'user_ip'      => $ip
      );
      $this->db->where('user_id', $userid);
      $this->db->update('tx_user', $data);
      return true;
    }

   function get_userid($uid) {
      $this->db->where('user_id', $uid);
      return $this->db->get($this->table);
   }

   function get_alllevel() {
      return $this->db->get('tx_level')->result();  
   }

   function get_allvendor() {
      return $this->db->get('tx_mitra_os')->result();  
   }

   function get_vendor() {
      $mitraid = array('1', '2');
      $this->db->where_in('mitraos_id', $mitraid);
      return $this->db->get('tx_mitra_os')->result();  
   }

   function check_level($id) {
      $this->db->where('level_id', $id);
      return $this->db->get('tx_level')->result();
   }
    
   function check_vendor($id) {
      $this->db->where('mitraos_id', $id);
      return $this->db->get('tx_mitra_os')->result();
   }

   function save_user($data) {
       $this->db->insert('tx_user', $data);
   }

   function update_user($id, $data) {
      $this->db->where('user_id', $id);
      $this->db->update('tx_user', $data);
      return TRUE;  
   } 

   function delete_user($id) {
      $this->db->where('user_id', $id);
      $this->db->delete('tx_user');
      return TRUE;    
   }

}

/* End of file M_user.php */
/* Location: ./application/models/sadmin/ */    