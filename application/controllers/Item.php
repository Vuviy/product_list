<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('item_model');
        $this->load->model('category_model');
    }

    public function index()
	{
        $data['items'] = $this->item_model->getInfo();

        $data['categories'] = $this->category_model->getInfo();

        $data['title'] = 'List';
        if(!empty($_GET)){

            $status = $this->input->get('status');
            $cat = $this->input->get('category');

            $data['items'] = $this->item_model->filter($status, $cat);

        }

		$this->load->view('layouts/head', $data);
		$this->load->view('list_items');
		$this->load->view('layouts/footer');
	}

    public function add(){

//        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Create a item';

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('category_id', 'category_id', 'required');


        if ($this->form_validation->run() === FALSE)
        {
            $data['categories'] = $this->category_model->getInfo();
            $this->load->view('layouts/head', $data);
            $this->load->view('add_items');
            $this->load->view('layouts/footer');
        }
        else
        {
            $cat = $this->input->post('category_id');

            if($cat === 'category'){
                $data['categories'] = $this->category_model->getInfo();
                $data['error'] = 'You must choose category';
                $this->load->view('layouts/head', $data);
                $this->load->view('add_items');
                $this->load->view('layouts/footer');
            } else{


            $this->item_model->create();
            header("Location: list_items");
            die();
            }
        }
    }

    public function ajaxDeleteItem(){

        $id = $this->input->post('id');

        if(isset($id)){
            $this->item_model->delete($id);
        }


        $this->output->set_output(json_encode(['success' => true, 'id'=> $id]));

    }

    public function ajaxChangeStatusItem(){

        $id = $this->input->post('id');
        $status = $this->input->post('status');

        if($status == false){
            $status = 1;
        } else{
            $status = 0;
        }

        if(isset($id)){
            $this->item_model->changeStatus($id);
        }
        $this->output->set_output(json_encode(['success' => true, 'id'=> $id, 'status' => $status]));

    }

//    public function filter(){
//
//        $p = $this->input->get('status');
//        $c = $this->input->get('category');
//
//        $data = ['status' => $p, 'category' => $c];
//
//        $this->output->set_output(json_encode($data));
//
//    }
}
