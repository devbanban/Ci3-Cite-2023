<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Multiples extends CI_Controller {

    public function __construct()
        {
                parent::__construct();
                $this->load->model('Multiples_model');
        }


	public function index()
	{
        $data['query'] = $this->Multiples_model->list_all();
        // echo '<pre>';
        // print_r($data);
		$this->load->view('multiple_list_v', $data);
	}

    public function formAddd()
    {
       $this->load->view('multiple_form_add');
    }

    public function adddData()
    {
        // echo '<pre>';
        // print_r($_POST);
        // echo '</pre>';
        // // exit;


        $this->form_validation->set_rules(
            'name[]', 'ชื่อ-สกุล',
            'required|min_length[3]|max_length[10]',
            array(
                    'required'      => 'กรุณากรอกข้อมูลให้ครบถ้วน %s.',
                    'min_length'      => 'กรอกข้อมูลขั้นต่ำ 3 ตัว',
                    'max_length'      => 'คุณกรอกข้อมูลเกิน 10 ตัว',
            )
         );


        if ($this->form_validation->run() == FALSE)
        {
                $this->load->view('multiple_form_add');
        }
        else
        {
            //ตรวจสอบการ insert data
            $result = $this->Multiples_model->insert_data2();
            if($result){
                //echo 'Register Successfully';
                redirect('multiples','refresh');
            }else{ //save_error
                //echo 'Update Wrong!!';
                redirect('multiples/adddData/','refresh');
            }
        }


    }

    public function checking()
    {
        if (isset($_POST['id']) && $_POST['act'] =='edit' && $_POST['id']!=''){
            //echo 'edit';

               // print_r($_POST);
               // echo '<hr>';
               foreach ($_POST['id'] as $key => $value) {
                  //echo $value . ',';
                  $id[] = "" .$key. "";
               }
               $id = implode(", ", $id);
               echo '<br>';
               echo 'id form checkbox = '. $id . '<br>';

              //exit();
            $data['rsedit']=$this->Multiples_model->Detail($id);

            //echo 'data from query : ';
            //echo '<pre>';
            print_r($data['rsedit']);
            //echo '</pre>';
           // exit();

            $this->load->view('multiples_update', $data);

      
        }else if(isset($_POST['id']) && $_POST['act'] == 'del' && $_POST['id']!=''){

           // print_r($_POST);
 
            $result = $this->Multiples_model->del_data();
            // exit();
            if($result){
                //echo 'Register Successfully';
                redirect('multiples','refresh');
            }else{ //save_error
                //echo 'Update Wrong!!';
                redirect('multiples/','refresh');
            }
        }else{
            redirect('multiples/','refresh');
        }
    }

    public function updateData()
    {

            // echo '<pre>';
            // print_r($_POST);
            // echo '</pre>';
           //exit();


         $this->form_validation->set_rules(
            'name[]', 'ชื่อ-สกุล',
            'required|min_length[3]|max_length[10]',
            array(
                    'required'      => 'กรุณากรอกข้อมูลให้ครบถ้วน %s.',
                    'min_length'      => 'กรอกข้อมูลขั้นต่ำ 3 ตัว',
                    'max_length'      => 'คุณกรอกข้อมูลเกิน 10 ตัว',
            )
         );

         foreach ($_POST['name'] as $key => $value) {
                 // echo $key . $value . '<hr>';
                  $id[] = "" .$key. "";
               }
               $id = implode(", ", $id);




        if ($this->form_validation->run() == FALSE)
        {

            


            $data['rsedit']=$this->Multiples_model->Detail($id);
            $this->load->view('multiples_update', $data);
  
        }
        else
        {
            //ตรวจสอบการ update data
            $result = $this->Multiples_model->update_data2();
            if($result){
                //echo 'Register Successfully';
                redirect('multiples','refresh');
            }else{ //save_error
                //echo 'Update Wrong!!';
                redirect('multiples','refresh');
            }
        }
    }
 
}