<?php

class Category_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function getInfo(){
        return $this->db->get('category')->result_array();
    }

    public function create()
    {
        $this->load->helper('url');
        $data = array(
            'title' => $this->input->post('title'),
        );
        return $this->db->insert('category', $data);
    }


    public function delete($id){
        return $this->db->delete('category', ['id' => $id]);
    }
}