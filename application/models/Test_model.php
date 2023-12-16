<?php

class Test_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function getInfo(){
        return $this->db->get('test')->result_array();
    }

    public function set_news()
    {
        $this->load->helper('url');

        $data = array(
            'title' => $this->input->post('title'),
            'text' => $this->input->post('text')
        );

        return $this->db->insert('test', $data);
    }
}