<?php

class Item_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function getInfo(){
        return $this->db->get('item')->result_array();
    }

    public function create()
    {
        $this->load->helper('url');

        $data = array(
            'title' => $this->input->post('title'),
            'category_id' => $this->input->post('category_id'),
            'status' => 0,
        );
        return $this->db->insert('item', $data);
    }

    public function delete($id){
        return $this->db->delete('item', ['id' => $id]);
    }


    public function changeStatus($id){

        $this->db->where('id', $id);
        $item =  $this->db->get('item')->row_array();

        $data = [
            'status' => 0,
        ];

        if($item['status'] == false){
            $data = [
                'status' => 1,
            ];
        }
            $this->db->where('id', $id);
           return $this->db->update('item', $data);

    }

    public function filter($status, $cat_id){

        $data = [];

        if($status !== 'status'){
            $data['status'] =  $status;
        }

        if($cat_id !== 'category'){
            $data['category_id'] =  $cat_id;
        }

        $this->db->where($data);
        return $this->db->get('item')->result_array();
    }
}