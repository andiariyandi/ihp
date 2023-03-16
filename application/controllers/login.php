<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model('model_app');
    }

function index(){
			if($this->session->userdata('id_user')){
				redirect('home');
			}else{
				$this->load->view('login');
			}
}

  function login_akses(){
  	$username = trim($this->input->post('username'));
  	$password = md5(trim($this->input->post('password')));

		$akses = $this->db->query("SELECT id_user, name, level, notlp, alamat, jk FROM user
				WHERE username = '$username' AND password = '$password'");

    if($akses->num_rows() == 1){
			foreach($akses->result_array() as $data){
				$isLoggedIn = 1;
				$session['id_user'] = $data['id_user'];
				$session['name'] = $data['name'];
				$session['level'] = $data['level'];
				$this->session->set_userdata($session);
    		redirect('home');
			}
		} else {
			$this->session->set_flashdata("msg",
			"<div class='alert bg-danger' role='alert'>
			 <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			 <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> username / Password salah.
			 </div>");
			 redirect('login');
		 }
  }


  public function logout() {
  	$this->session->sess_destroy();
		redirect('login');
	}

}
