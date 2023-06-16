<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CrudUpload extends CI_Controller {

	 public function __construct()
        {
                parent::__construct();
                $this->load->model('upload_model');
        }


	public function index()
	{
		//call function in model
		 $data['result']=$this->upload_model->getAllImage();
		 $this->load->view('upload_list', $data);
	}

	public function add()
	{
		  $this->load->view('upload_form', array('error' => ' ' ));
	}

	public function add_db()
	{

		 // echo '<pre>';
   //          print_r($_POST);
   //          exit;

		$this->form_validation->set_rules('name', 'ชื่อ', 'trim|required|min_length[3]',
        array(
        	'required' => 'บังคับกรอกข้อมูล',
        	'min_length' => 'กรอกข้อมูลขั้นต่ำ 3 ตัวอักษร',
        	'max_length' => 'กรอกข้อมูลสูงสูดไม่เกิน 12 ตัวอักษร',
			    )
			);



		if ($this->form_validation->run() == FALSE)
                {
                        $this->load->view('upload_form', array('error' => ' ' ));
                }
                else
                {

                // upload 
                $config['upload_path']          = './assets/pic/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 400;
                $config['encrypt_name']			= TRUE;

                //upload img rule
                $this->load->library('upload', $config);
                if ( ! $this->upload->do_upload('img'))
                {
                        $error = array('error' => $this->upload->display_errors());

                        $this->load->view('upload_form', $error);
                }
                else
                {
                	//upload ได้ ไม่ผิดเงือ่นไข
                          // echo $this->upload->data('file_name');  // insert db
                           //exit;

	                        $result = $this->upload_model->add_db_img();
								if($result){
									//echo 'Insert Successfully';
								redirect('crudupload','refresh');
								}else{ //save_error
									echo 'error';
								//redirect('crud/list','refresh');
								}
                }

                // end upload 
                }
	}

	public function edit($id)
	{
		//call function in model
		 $data['rsedit']=$this->upload_model->detail($id);
         $data['error'] = '';
		 //ถ้าคิวรี่ข้อมูลไม่ได้
		 if($data['rsedit']->id==''){
		 	redirect('crudUpload','refresh');
		 }else{
            $this->load->view('upload_edit', $data);
         }
	}



	public function edit_db_img()
	{
            // echo '<pre>';
            // print_r($_POST);
            // exit;

		$this->form_validation->set_rules('id', 'id', 'required');


		$this->form_validation->set_rules('name', 'ชื่อ', 'trim|required|min_length[3]|max_length[12]',
        array(
        	'required' => 'บังคับกรอกข้อมูล',
        	'min_length' => 'กรอกข้อมูลขั้นต่ำ 3 ตัวอักษร',
        	'max_length' => 'กรอกข้อมูลสูงสูดไม่เกิน 12 ตัวอักษร',
			    )
			);



		if ($this->form_validation->run() == FALSE)
                {
                		$data['rsedit']=$this->upload_model->detail($this->input->post('id'));
                        $data['error'] = '';
                        $this->load->view('upload_edit', $data);
                }
                else
                {

                	//check upload file
                	///print_r($_FILES);
                	$filename = $_FILES['img']['name'];

                	//echo $filename;

                	//exit();

                	if ($filename !='') {
                		//upload new file & delete old pic
                		// upload 
			                $config['upload_path']          = './assets/pic/';
			                $config['allowed_types']        = 'gif|jpg|png|jpeg'; //iphone image type = jpeg
			                $config['max_size']             = 300;
			                $config['encrypt_name']			= TRUE;

			                //upload img rule
			                $this->load->library('upload', $config);
			                if ( ! $this->upload->do_upload('img'))
			                {
			                        $data = array('error' => $this->upload->display_errors());
			                        //$this->load->view('form_upload_view', $error);
			                        $data['rsedit']=$this->upload_model->detail($this->input->post('id'));
                        			$this->load->view('uplode_edit', $data);
			                }else{
				                //upload ได้ ไม่ผิดเงือ่นไข
		                        	$result = $this->upload_model->edit_db_img($this->input->post('id'));
									if($result){
										unlink('assets/pic/'.$this->input->post('img2'));
										//echo 'update Successfully';
										redirect('crudUpload','refresh');
									}else{ //save_error
										echo 'error';
									//redirect('crud/list','refresh');
									}

			                }
                	}else{
                		//use old image file

                		$result = $this->upload_model->edit_db_without_img($this->input->post('id'));
									if($result){
										//echo 'update Successfully';
										redirect('crudUpload','refresh');
									}else{ //save_error
										echo 'error';
									//redirect('crud/list','refresh');
									}


                	}

                }
	}

	
	public function delete($id)
	{
		 $data['rsedit']=$this->upload_model->detail($id);
		 if($data['rsedit']->id==''){
		 	redirect('crudUpload','refresh');
		 }else{
            $this->upload_model->deleteImg($id);
		    unlink('assets/pic/'.$data['rsedit']->img); //ลบภาพออกจากเซิฟเวอร์
		    redirect('CrudUpload','refresh');
         }
	}
 
}