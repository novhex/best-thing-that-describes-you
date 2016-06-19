<?php
/**
* 
*/
defined('BASEPATH') or exit('Error!');

class Home extends CI_Controller{
	
	private $data;

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('home_model');
		$this->load->library('facebook'); 

	}

	public function index(){

		$this->data['login_url'] = $this->facebook->getLoginUrl(array(
                'redirect_uri' => site_url('home/login'), 
                'scope' => array("email") // permissions here
            ));
		$this->data['title'] = " Best thing that describes you ! | Neko Fun !";
		$this->load->view('tpl/header',$this->data);
		$this->load->view('home',$this->data);
		$this->load->view('tpl/footer');
	}

	public function login(){

		// Automatically picks appId and secret from config


		$user = $this->facebook->getUser();
        
        if ($user) {
            try {
                $data['user_profile'] = $this->facebook->api('/me');
                
            } catch (FacebookApiException $e) {
                $user = null;
            }
        }else {
            // Solves first time login issue. (Issue: #10)
            //$this->facebook->destroySession();
        }

        if ($user) {

           
        } else {
            $data['login_url'] = $this->facebook->getLoginUrl(array(
                'redirect_uri' => site_url('home/login'), 
                'scope' => array("email") // permissions here
            ));
        }

		

		$this->load->view('login',$data);
	}

	public function logout(){

        // Logs off session from website
        $this->session->unset_userdata('dp');
        $this->session->unset_userdata('current_user');
        $this->facebook->destroySession();
        redirect(base_url('/'));
	}

	public function results($url){

		$this->data['title']="Best thing that describes you ! | Neko Fun !";
		$this->data['logs'] = $this->home_model->getUserResult($url);
		$this->load->view('tpl/header',$this->data);
		$this->load->view('results',$this->data);
		$this->load->view('tpl/footer');

	}

	public function show_rand_personality(){
		
		$str_to_replace = $this->session->userdata('current_user');
		$strs = "";

		if($this->input->is_ajax_request()){

			$max_record = $this->home_model->getRecordCount();

			$random_number = mt_rand(1,$max_record);

			$data = $this->home_model->getPersonalityDesc($random_number);

			$time_stamp = time();


			foreach($data as $index){
				$strs = "<p> Results: </p>";
				$strs .= str_replace("<name>", $str_to_replace, $index['pt_DESC']);
				$strs .= "<br><br> <a href='https://www.facebook.com/sharer/sharer.php?u=".base_url('results/').'/'.$time_stamp."'  style=\"background-color:#3b5998;\" class='btn btn-sm btn-default'><i class='fa fa-facebook-square'></i> Share on Facebook </a>";
				$this->home_model->insert_log(array('slug'=>$time_stamp,'pID_result'=>$random_number,'p_username'=>$str_to_replace,'p_dp'=>$this->session->userdata('dp')));
			}

			echo $strs;

		}
	}
}