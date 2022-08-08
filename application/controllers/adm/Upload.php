<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logged_in')) redirect(base_url());
      $this->load->library('template');
      $this->load->helper('file');
	}

	function index()
	{
		$data['userid']    = $this->session->userdata('userid');
		$data['username']  = $this->session->userdata('username');
		$data['userlvl']   = $this->session->userdata('userlvl'); 
		$data['namalogin'] = $this->session->userdata('namalogin'); 
		$data['endpoint']= $this->config->item('endpoint');
		$data['secret']= $this->config->item('secret');
			$data['title_header'] 	 = "Form";
			$data['title_subheader'] = "Upload KLHK";

			$this->template->display('backend/upload_v', $data);
	}

	function proses()
	{
		$this->session->set_flashdata('data',array());
		 if($this->input->post('importSubmit')) {
		 	$uid = $this->input->post('uid');
		 	$endpoint = $this->input->post('endpoint');
		 	$secret = $this->input->post('secret');

	            $this->form_validation->set_rules('file', 'CSV file', 'callback_file_check');
	            
	            // Validate submitted form data
	            if($this->form_validation->run() == true){   
	                // If file uploaded
	                if(is_uploaded_file($_FILES['file']['tmp_name'])){
	                    // Load CSV reader library
	                    include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		
						$excelreader = new PHPExcel_Reader_Excel2007();
						$loadexcel = $excelreader->load($_FILES['file']['tmp_name']); // Load file yang telah diupload ke folder excel
						$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
						
						// Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
						$data = array();
						
						$numrow = 1;
						try {
							foreach($sheet as $row){
								if($numrow > 1){

									if(!isset($row['C']))
									{
										throw new Exception("Value PH kosong");
									}
									if(!isset($row['D']))
									{
										throw new Exception("Value TSS kosong");
									}
									if(!isset($row['E']))
									{
										throw new Exception("Value COD kosong");
									}
									if(!isset($row['F']))
									{
										throw new Exception("Value NH3N kosong");
									}
									if(!isset($row['G']))
									{
										throw new Exception("Value DEBIT kosong");
									}
									if(!isset($row['D']))
									{
										throw new Exception("Value DATETIME kosong");
									}

									$data_row = array(
										'uid' => $uid,
										'datetime'=>strtotime($row['H']) * 1000,
										'pH'=>str_replace(',','.',$row['C']),
										'cod'=>str_replace(',','.',$row['E']),
										'tss'=>str_replace(',','.',$row['D']),
										'nh3n'=>str_replace(',','.',$row['F']),
										'debit'=>str_replace(',','.',$row['G'])
									);
									$token = JWT::encode($data_row, $secret);
									
									$response = $this->send_post($endpoint,$token).'<br>';
									array_push($data, array(
										'uid' => $uid,	
										'datetime'=>strtotime($row['H']) * 1000,
										'pH'=>str_replace(',','.',$row['C']), 
										'cod'=>str_replace(',','.',$row['E']),
										'tss'=>str_replace(',','.',$row['D']),
										'nh3n'=>str_replace(',','.',$row['F']),
										'debit'=>str_replace(',','.',$row['G']),
										'response' => $response
									));
									
								}
								else{
									if(isset($row['A']) != 'DEVICE' OR isset($row['B']) != 'LOCATION' OR isset($row['C']) != 'PH' OR isset($row['D']) != 'TSS' OR isset($row['E']) != 'COD' OR isset($row['F']) != 'NH3N' OR isset($row['G']) != 'DEBIT' OR isset($row['H']) != 'DATETIME'  )
									{
										throw new Exception("Header format upload salah");
									}
								}
								
								$numrow++;
							}
							$this->session->set_flashdata('data',$data);
							$this->session->set_flashdata('notification','Data berhasil di upload');
						} catch (Exception $e) {
							 $this->session->set_flashdata('error',$e->getMessage());
						}
	            }else{
	                 
	                  $this->session->set_flashdata('error','Invalid file, please select only XLSX file.');
	            }
	        }
	        else{
	        	  $this->session->set_flashdata('error','Invalid file, please select only XLSX file.');
	        
	        }
			redirect('adm/upload');
		}
	}

	public function tanggal()
	{
		$date = strtotime('01/07/2022  17:59:00') * 1000;
		
		echo $date;
	}
	 public function send_post($endpoint, $token)
    {
        /* API URL */
        $url = $endpoint;
   
        /* Init cURL resource */
        $ch = curl_init($url);
   
        /* Array Parameter Data */
        $data = array('token' => $token);
   		$data = json_encode($data);
        /* pass encoded JSON string to the POST fields */
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            
        /* set the content type json */
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
            
        /* set return type json */
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            
        $result = curl_exec($ch);
        /* close cURL resource */
        curl_close($ch);
        return $result;
    }

	public function file_check($str){
        $allowed_mime_types = array('application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        if(isset($_FILES['file']['name']) && $_FILES['file']['name'] != ""){
            $mime = get_mime_by_extension($_FILES['file']['name']);
            $fileAr = explode('.', $_FILES['file']['name']);
            $ext = end($fileAr);
            if(($ext == 'xlsx') && in_array($mime, $allowed_mime_types)){
                return true;
            }else{
                $this->form_validation->set_message('file_check', 'Please select only XLSX file to upload.');
                return false;
            }
        }else{
            $this->form_validation->set_message('file_check', 'Please select a XLSX file to upload.');
            return false;
        }
    }

}

/* End of File sekolah.php */
/* Location: ./application/modules/controller/ */
