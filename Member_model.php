<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member_model extends CI_Model {

    public function getAllMember()
	{
		$query = $this->db->get('tbl_member'); 
		return $query->result();
	}


    public function insert_member()
	{
		$data = array(
	        'name' => $this->input->post('name'),
	        'lastname' => $this->input->post('lastname')
		);
		$this->db->insert('tbl_member', $data);
		//คล้ายใช้ if result == true
		if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
	}

    public function delleteData($id)
    {
        $this->db->where('id', $id);
		$this->db->delete('tbl_member');
    }

    public function memberDetail($id)
        {
               	$this->db->select('*');
				$this->db->from('tbl_member');
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