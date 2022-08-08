<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('users_m');
		$this->load->model('log_m');
		$this->load->library('recaptcha');
	}

	function index() {
		$session = $this->session->userdata('logged_in_xpuraos');
		$data = array(
         'captcha' => $this->recaptcha->getWidget(), // menampilkan recaptcha
         'script_captcha' => $this->recaptcha->getScriptTag(), // javascript recaptcha ditaruh di head
      );

		// if ($session == FALSE) {
			$this->load->view('xlogin_v', $data);
		// } else {
		// 	$this->load->view('xlogin_v', $data);
		// }
	}

	function validasi() {
    $kunci_user = "user_klhk_upload";
    $kunci_password = "adminku1234!@#$";
		$xusername 	= trim($this->input->post('username', 'true'));
		$username   = scriptHTMLtags($xusername);
		$xpassword 	= trim($this->input->post('password', 'true'));
		$password   = scriptHTMLtags($xpassword);
		
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

      $recaptcha = $this->input->post('g-recaptcha-response');
      $response = $this->recaptcha->verifyResponse($recaptcha);

    if ($this->form_validation->run() == FALSE || !isset($response['success']) || $response['success'] <> true) {
         $this->session->set_flashdata('error','Captcha harus dicentang..');
         redirect(base_url());	
		} else {
			if ($xusername != $kunci_user && $xpassword != $kunci_password) {
				$this->session->set_flashdata('notification','<b>Maaf, user Anda belum terdaftar.</b>');
				redirect(base_url());
			} else {				
        $array_item = array(
            'username'        => $kunci_user,
            'logged_in' => TRUE
            );
          
        $this->session->set_userdata($array_item);
        redirect(site_url('adm/upload'));
			}
		}
	}

	function expired_dataos()
	{
		$this->db->query("UPDATE tx_biodata_os set biodata_kode = '' where biodata_status = 0 and biodata_create <= DATE_ADD(NOW(), INTERVAL -3 DAY)");
	}

	function logout() {
		$username  = $this->session->userdata('username');
		$userid 	  = $this->session->userdata('userid');
		$namalogin = $this->session->userdata('namalogin'); 
		$usersts   = $this->session->userdata('usersts'); 
		$mitraos   = $this->session->userdata('mitraos'); 
		$ip        = _ip();

		if ($username!='') {
			date_default_timezone_set("Asia/Jakarta"); 
         $datetime = date("Y-m-d H:i:s");

			$this->users_m->userlogout($userid, $ip);			
			$agent = $_SERVER["HTTP_USER_AGENT"];
         $log = array(
            'log_username'  => $username,
		      'log_modul'     => 'Logout',
		      'log_aktivitas' => 'Uid : '.$userid.', nama user : '.$namalogin.', status : '.$usersts.', mitra os : '.$mitraos,
		      'log_agent'		 => $agent,
		      'log_ip'			 => $ip	
		   );
		   $this->log_m->save($log); 
		}	
		
		$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . 'GMT');
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-chace');
		$this->session->sess_destroy();
		redirect(base_url());
	}

	function CallAPI($url,$nik)
  {
      $ch = curl_init();
      $headers  = [
                  'Content-Type: application/json',
			'Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VybmFtZSI6IjMzMTgxMDAyMDk5NTAwMDYiLCJuYW1lIjoiQkFZVSBBTkdHT1JPIFNBS1RJIiwiZW1haWwiOiJiYXl1LmFuZ2dvcm8uc0BtYWlsLnVnbS5hYy5pZCIsInBob25lIjoiKzYyIDA4MTI1MzYyMTkxNiIsInVzZXJMZXZlbCI6MywiaWF0IjoxNjQ1NjY3OTkxfQ.BYOCQhap3EVYutb8fSqHekvc6R7szRLYGAbqaZNLxcg'
              ];
      $postData = [
          'nik' => $nik,
      ];
      curl_setopt($ch, CURLOPT_URL,$url);
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));           
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      $result     = curl_exec ($ch);
      $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
      if (curl_errno($ch)) {
          $error_msg = curl_error($ch);
      }
      if (isset($error_msg)) {
           echo($error_msg);
      }
      return $result;
  }
 
  function arrayDifference(array $array1, array $array2, array $keysToCompare = null) {
    $serialize = function (&$item, $idx, $keysToCompare) {
        if (is_array($item) && $keysToCompare) {
            $a = array();
            foreach ($keysToCompare as $k) {
                if (array_key_exists($k, $item)) {
                    $a[$k] = $item[$k];
                }
            }
            $item = $a;
        }
        $item = serialize($item);
    };

    $deserialize = function (&$item) {
        $item = unserialize($item);
    };

    array_walk($array1, $serialize, $keysToCompare);
    array_walk($array2, $serialize, $keysToCompare);

    $deletions = array_diff($array1, $array2);
    $insertions = array_diff($array2, $array1);

    array_walk($insertions, $deserialize);
    array_walk($deletions, $deserialize);

    return array('insertions' => $insertions, 'deletions' => $deletions);
  }

  function merge_posisi()
  {
    $data = $this->CallAPI('https://api2.puragroup.com/recruitment/test/get_posisi','');
    $hasil = json_decode($data)->DATA;

    $query = $this->db->query("SELECT * FROM tx_posisi")->result();
    foreach ($query as $row) {
        $data_mysql = array('KODE_POSISI' =>  $row->posisi_id, 
                               'NAMA_POSISI' =>  $row->posisi_nama, 
        );
         $mysql[] = $data_mysql;
    }
    foreach ( $hasil as $element ) {
          $data_oracle = array('KODE_POSISI' =>  $element->KODE_POSISI, 
                               'NAMA_POSISI' =>  $element->NAMA_POSISI, 
        );
           $oracle[] = $data_oracle;
    }
    $result = array();
    $result = $this->arrayDifference($mysql, $oracle);
    
    foreach ($result['insertions'] as $insert_row) {
      $data_insert = array('posisi_id' => $insert_row['KODE_POSISI'], 
                            'posisi_nama' => $insert_row['NAMA_POSISI'], 
                            );
       try {
          //$this->db->db_debug = FALSE;
          $result =  $this->db->insert('tx_posisi',$data_insert);

          if (!$result)
          {
            throw new Exception('error in query');
            return false;
          }        
          echo 'ok';
          
      } catch (Exception $e) {

          $data_update = array('posisi_nama' =>$insert_row['NAMA_POSISI'],
                                'posisi_update' => date('Y-m-d H:i:s')
          );
          $this->db->where('posisi_id',$insert_row['KODE_POSISI']);
          $this->db->update('tx_posisi',$data_update);
          return;
      }
      
    }
    if (count($result['deletions']) >0) {
    	 foreach ($result['deletions'] as $delete_row) { 
	      $this->db->where('posisi_id',$delete_row['KODE_POSISI']);
	      $this->db->delete('tx_posisi');
	    }
    }
    
   
  }

  function merge_jurusan()
  {
    $data = $this->CallAPI('https://api2.puragroup.com/recruitment/test/get_jurusan','');
    $hasil = json_decode($data)->DATA;
    $query = $this->db->query("SELECT * FROM tx_jurusan")->result();
    foreach ($query as $row) {
        $data_mysql = array('KODE_JURUSAN' =>  $row->jurusan_id, 
                               'NAMA_JURUSAN' =>  $row->jurusan_nama, 
        );
         $mysql[] = $data_mysql;
    }
    foreach ( $hasil as $element ) {
          $data_oracle = array('KODE_JURUSAN' =>  $element->KODE, 
                               'NAMA_JURUSAN' =>  $element->JURUSAN, 
        );
           $oracle[] = $data_oracle;
    }
    $result = $this->arrayDifference($mysql, $oracle);

    foreach ($result['insertions'] as $insert_row) {
      $data_insert = array('jurusan_id' => $insert_row['KODE_JURUSAN'], 
                            'jurusan_nama' => $insert_row['NAMA_JURUSAN'], 
                            );
       try {
          $this->db->db_debug = FALSE;
          $result =  $this->db->insert('tx_jurusan',$data_insert);

          if (!$result)
          {
            throw new Exception('error in query');
            return false;
          }        

      } catch (Exception $e) {
          $data_update = array('jurusan_nama' =>$insert_row['NAMA_JURUSAN'],
                                'jurusan_update' => date('Y-m-d H:i:s')
          );
          $this->db->where('jurusan_id',$insert_row['KODE_JURUSAN']);
          $this->db->update('tx_jurusan',$data_update);
          return;
      }
      
    }

    if (count($result['deletions']) > 0) {
        foreach ($result['deletions'] as $delete_row) { 
          $this->db->where('jurusan_id',$delete_row['KODE_POSISI']);
          $this->db->delete('tx_posisi');
        }
    }
  }

  function merge_sekolah()
  {
    $data = $this->CallAPI('https://api2.puragroup.com/recruitment/test/get_sekolah','');
    $hasil = json_decode($data)->DATA;
    $query = $this->db->query("SELECT * FROM tx_sekolah")->result();
    foreach ($query as $row) {
        $data_mysql = array('KODE_SEKOLAH' =>  $row->sekolah_id, 
                               'NAMA_SEKOLAH' =>  $row->sekolah_nama, 
        );
         $mysql[] = $data_mysql;
    }
    foreach ( $hasil as $element ) {
          $data_oracle = array('KODE_SEKOLAH' =>  $element->KODE_SEKOLAH, 
                               'NAMA_SEKOLAH' =>  $element->NAMA_SEKOLAH, 
        );
           $oracle[] = $data_oracle;
    }
    $result = $this->arrayDifference($mysql, $oracle);
    foreach ($result['insertions'] as $insert_row) {
      $data_insert = array('sekolah_id' => $insert_row['KODE_SEKOLAH'], 
                            'sekolah_nama' => $insert_row['NAMA_SEKOLAH'], 
                            );
       try {
          $this->db->db_debug = FALSE;
          $result =  $this->db->insert('tx_sekolah',$data_insert);

          if (!$result)
          {
            throw new Exception('error in query');
            return false;
          }        

      } catch (Exception $e) {
          $insert_row['KODE_SEKOLAH'];
          $data_update = array('sekolah_nama' =>$insert_row['NAMA_SEKOLAH'],
                                'sekolah_update' => date('Y-m-d H:i:s')
          );
          $this->db->where('sekolah_id',$insert_row['KODE_SEKOLAH']);
          $this->db->update('tx_sekolah',$data_update);
          return;
      }
      
    }
}

	// function saveuser() {
	// 	$pwd  = 'pwdos@pura#';
	// 	$data = array(
	// 		'user_username'	=> 'sysadmin',
	// 		'user_password'	=>  sha1(md5($pwd)),
	// 		'user_name'			=> 'Administrator',
	// 		'user_level'		=> '1',
	// 		'user_status'		=> '1',
	// 		'user_create'		=> date('Y-m-d H:i:s'),
	// 		'user_ip'			=> '127.0.0.1',
	// 		'user_update'		=> date('Y-m-d H:i:s')
	// 	);
	// 	$this->db->insert('tx_user', $data);
	// }
}

/* End of file Welcome.php */
/* Location: ./application/controllers */
