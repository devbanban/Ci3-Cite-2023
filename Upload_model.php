<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload_model extends CI_Model {

    public function getAllImage()
	{
		$query = $this->db->get('tbl_upload'); 
		return $query->result();
	}

    public function add_db_img()
	{
		$data = array(
	        'name' => $this->input->post('name'),
            'img' => $this->upload->data('file_name')
		);
		$this->db->insert('tbl_upload', $data);
		//คล้ายใช้ if result == true
		if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
	}

    public function edit_db_img($id)
    {
        $data = array(
	        'name' => $this->input->post('name'),
            'img' => $this->upload->data('file_name')
		);

        $this->db->where('id',$id);
        $this->db->update('tbl_upload', $data);

        //คล้ายใช้ if result == true
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }

    public function edit_db_without_img($id)
    {
        $data = array(
	        'name' => $this->input->post('name')
		);

        $this->db->where('id',$id);
        $this->db->update('tbl_upload', $data);

        //คล้ายใช้ if result == true
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }


    

    public function deleteImg($id)
    {
        $this->db->where('id', $id);
		$this->db->delete('tbl_upload');
    }

    public function detail($id)
        {
               	$this->db->select('*');
				$this->db->from('tbl_upload');
                $this->db->where('id',$id);
                $rs = $this->db->get();
                if($rs->num_rows() > 0){
                        $data = $rs->row();
                        return $data;
                }
                return FALSE;
        }

    public function edit_member($id)
        {
        	$data = array(
		        'name' => $this->input->post('name'),
	        	'lastname' => $this->input->post('lastname')
			);
			$this->db->where('id',$id);
			$this->db->update('tbl_member', $data);

            //คล้ายใช้ if result == true
            if($this->db->affected_rows() > 0){
                return true;
            }else{
                return false;
            }

        }




}