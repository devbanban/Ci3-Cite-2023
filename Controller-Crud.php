<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends CI_Controller {

	public function __construct()
        {
                parent::__construct();
                $this->load->model('member_model');
        }


	public function index()
	{
        $data['result'] = $this->member_model->getAllMember();
		$this->load->view('member_list', $data);
	}

    public function adding()
    {
        $this->load->view('member_form_add');
    }


    public function adddata()
    {

         echo '<pre>';
            print_r($_POST);
            exit;

        $this->form_validation->set_rules('name', 'ชื่อ', 'trim|required|min_length[3]',
            array(
                'required' => 'ห้ามว่าง',
                'min_length' => 'กรอกขั่นตำ 3 ตัว '
                )
        );

        $this->form_validation->set_rules('lastname', 'นามสกุล', 'trim|required|min_length[3]',
            array(
                'required' => 'ห้ามว่าง',
                'min_length' => 'กรอกขั่นตำ 3 ตัว '
                )
        );

       
            if ($this->form_validation->run() == FALSE)
            {
                    $this->load->view('member_form_add');
            }
            else
            {
                    //ตรวจสอบการ insert data
                		$result = $this->member_model->insert_member();
						if($result){
							redirect('crud','refresh');
						}else{ //save_error
							redirect('crud/adding','refresh');
						}
            }
    }


    public function delete($id)
	{
        // echo $id;
        // exit;
		 $this->member_model->delleteData($id);
         redirect('crud', 'refresh');
	}

    public function edit($id)
    {
        $data['rsedit'] = $this->member_model->memberDetail($id);
        
       if($data['rsedit']->id !=''){
            $this->load->view('member_form_edit', $data);
       }else{
            redirect('crud', 'refresh');
       }
    }

    public function editdata()
    {
        
        echo '<pre>';
        print_r($_POST);
        exit;

        $this->form_validation->set_rules('id', 'id', 'trim|required|min_length[1]',
            array(
                'required' => 'ห้ามว่าง',
                'min_length' => 'กรอกขั่นตำ 1 ตัว '
                )
        );


        $this->form_validation->set_rules('name', 'ชื่อ', 'trim|required|min_length[3]',
            array(
                'required' => 'ห้ามว่าง',
                'min_length' => 'กรอกขั่นตำ 3 ตัว '
                )
        );

        $this->form_validation->set_rules('lastname', 'นามสกุล', 'trim|required|min_length[3]',
            array(
                'required' => 'ห้ามว่าง',
                'min_length' => 'กรอกขั่นตำ 3 ตัว '
                )
        );

       
            if ($this->form_validation->run() == FALSE)
            {
                    $id = $this->input->post('id');
                    $data['rsedit'] = $this->member_model->memberDetail($id);
                    $this->load->view('member_form_edit', $data);
            }
            else
            {
                    //ตรวจสอบการ update data
                        $id = $this->input->post('id');
                		$result = $this->member_model->edit_member($id);
						if($result){
							redirect('crud','refresh');
						}else{ //save_error
							redirect('crud/adding','refresh');
						}
            }
    }

}
