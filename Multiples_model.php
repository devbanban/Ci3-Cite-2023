<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Multiples_model extends CI_Model {

  public function list_all()
	{
		$query = $this->db->get('tbl_multiples'); 
		return $query->result();
	}



    public function insert_data2()
    {

        foreach($_POST['name'] as $name){

        $data = array(
         array('name' => $name)
        );


        $this->db->insert_batch('tbl_multiples', $data);
        } // foreach
         //คล้ายใช้ if result == true
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    } //insert data

	


//where in 
	public function Detail($id)
        {
           $sql =" SELECT * FROM tbl_multiples  WHERE id IN($id)";
           $rs = $this->db->query($sql)->result();
           return $rs;
        }


    public function update_data2()
    {
         foreach($_POST['name'] as $id => $name){


        $data[] = array(
                  'name' => $name,
                  'id' => $id
            );

        ///print_r($data);

        //$this->db->where('id', $id);
        $this->db->update_batch('tbl_multiples', $data, 'id');
    } // f

        if($this->db->affected_rows() > 0){
                    return true;
                   }else{
                    return false;
                   }
    }



	public function del_data()
	{

    foreach($_POST['id'] as $id){
		$this->db->delete('tbl_multiples', array('id' => $id));
      } //foreach

            if($this->db->affected_rows() > 0){
                return true;
            }else{
                return false;
            }

	} //func



}