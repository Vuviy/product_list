<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('category_model');
    }

    public function index()
	{

        $data['items'] = $this->category_model->getInfo();

        $data['title'] = 'List Category';

		$this->load->view('layouts/head', $data);
		$this->load->view('list_category', $data);
		$this->load->view('layouts/footer');
	}

    public function add(){

        $this->load->library('form_validation');

        $data['title'] = 'Create a category';

        $this->form_validation->set_rules('title', 'Title', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('layouts/head', $data);
            $this->load->view('add_category', $data);
            $this->load->view('layouts/footer');

        }
        else
        {
            $this->category_model->create();

            header("Location: list_category");
            die();
        }
    }

    public function ajaxDeleteCategory(){

        $id = $this->input->post('id');

        if(isset($id)){
            $this->category_model->delete($id);
        }

        $this->output->set_output(json_encode(['success' => true, 'id'=> $id]));

    }
}
