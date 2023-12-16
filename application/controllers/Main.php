<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */



//    public function __construct()
//    {
//        parent::__construct();
////        $this->load->model('test_model');
//    }

    public function index()
	{

//        redirect('item/list_items');
        header("Location: item/list_items");
        die();
//        $data['info'] = $this->test_model->getInfo();
//
//        foreach ($data['info'] as $item){
//            echo '<pre>';
//            var_dump($item['title']);
//            echo '<br>';
//            var_dump($item['text']);
//
//        }
//        exit();
//
//
//		$this->load->view('welcome_message', $data);
	}
}
