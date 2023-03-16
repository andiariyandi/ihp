<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

function __construct(){
        parent::__construct();
        $this->load->model('model_app');

        if(!$this->session->userdata('id_user'))
       {
        $this->session->set_flashdata("msg", "<div class='alert alert-info'>
       <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
       <strong><span class='glyphicon glyphicon-remove-sign'></span></strong> Silahkan login terlebih dahulu.
       </div>");
        redirect('login');
        }

    }


 function user_list()
 {

 	    $data['header'] = "header/header";
      $data['navbar'] = "navbar/navbar";
      $data['sidebar'] = "sidebar/sidebar";
      $data['body'] = "body/user";

        // $id_dept = trim($this->session->userdata('id_dept'));
        $id_user = trim($this->session->userdata('id_user'));
        // $id_dept = trim($this->session->userdata('id_dept'));
        $id_user = trim($this->session->userdata('id_user'));

        //notification
        //
        $sql_listticket = "SELECT COUNT(id_ticket) AS jml_list_ticket FROM ticket WHERE status = 3";
        $row_listticket = $this->db->query($sql_listticket)->row();
        //
        $data['notif_list_ticket'] = $row_listticket->jml_list_ticket;
        //
        // $sql_approvalticket = "SELECT COUNT(A.id_ticket) AS jml_approval_ticket FROM ticket A
        // LEFT JOIN sub_kategori B ON B.id_sub_kategori = A.id_sub_kategori
        // LEFT JOIN kategori C ON C.id_kategori = B.id_kategori
        // -- LEFT JOIN karyawan D ON D.nik = A.reported
        // LEFT JOIN bagian_departemen E ON E.id_bagian_dept = D.id_bagian_dept WHERE E.id_dept = $id_dept AND status = 1";
        // $row_approvalticket = $this->db->query($sql_approvalticket)->row();
        //
        // $data['notif_approval'] = $row_approvalticket->jml_approval_ticket;
        //
        $sql_assignmentticket = "SELECT COUNT(id_ticket) AS jml_assignment_ticket FROM ticket WHERE status = 3";
        $row_assignmentticket = $this->db->query($sql_assignmentticket)->row();
        //
        $data['notif_assignment'] = $row_assignmentticket->jml_assignment_ticket;

        //end notification

        $data['link'] = "user/hapus";

        $datauser = $this->model_app->datauser();
	      $data['datauser'] = $datauser;

        $this->load->view('template', $data);

 }

 function hapus()
 {
 	$id = $_POST['id'];

 	$this->db->trans_start();

 	$this->db->where('id_user', $id);
 	$this->db->delete('user');

 	$this->db->trans_complete();

 }

 function add()
 {

 	    $data['header'] = "header/header";
      $data['navbar'] = "navbar/navbar";
      $data['sidebar'] = "sidebar/sidebar";
      $data['body'] = "body/form_user";

    // $data['dd_karyawan'] = $this->model_app->dropdown_karyawan();
		// $data['id_karyawan'] = "";

    // $id_dept = trim($this->session->userdata('id_dept'));
    $id_user = trim($this->session->userdata('id_user'));

    //notification
    //
    $sql_listticket = "SELECT COUNT(id_ticket) AS jml_list_ticket FROM ticket WHERE status = 3";
    $row_listticket = $this->db->query($sql_listticket)->row();
    //
    $data['notif_list_ticket'] = $row_listticket->jml_list_ticket;
    //
    // $sql_approvalticket = "SELECT COUNT(A.id_ticket) AS jml_approval_ticket FROM ticket A
    // LEFT JOIN sub_kategori B ON B.id_sub_kategori = A.id_sub_kategori
    // LEFT JOIN kategori C ON C.id_kategori = B.id_kategori
    // -- LEFT JOIN karyawan D ON D.nik = A.reported
    // LEFT JOIN bagian_departemen E ON E.id_bagian_dept = D.id_bagian_dept WHERE E.id_dept = $id_dept AND status = 1";
    // $row_approvalticket = $this->db->query($sql_approvalticket)->row();
    //
    // $data['notif_approval'] = $row_approvalticket->jml_approval_ticket;
    //
    $sql_assignmentticket = "SELECT COUNT(id_ticket) AS jml_assignment_ticket FROM ticket WHERE status = 3";
    $row_assignmentticket = $this->db->query($sql_assignmentticket)->row();
    //
    $data['notif_assignment'] = $row_assignmentticket->jml_assignment_ticket;

    //end notification


		 $data['dd_level'] = $this->model_app->dropdown_level();
	 $data['id_level'] = "";

  	$data['username'] = $this->model_app->getusername();
    $data['dd_jk'] = $this->model_app->dropdown_jk();
    $data['id_jk'] = "";

    $data['name'] = "";
    $data['alamat'] = "";
    $data['notlp'] = "";
    $data['email'] = "";
  	$data['password'] = $this->model_app->getusername();

		$data['id_user'] = "";

		$data['url'] = "user/save";

		$data['flag'] = "add";

        $this->load->view('template', $data);

 }

 function save()
 {
	$id_user = "";

 	$username = $this->model_app->getusername();
  $password = $this->model_app->getusername();
 	// $password = strtoupper(trim($this->input->post('password')));
 	$id_level = strtoupper(trim($this->input->post('id_level')));
  $name = strtoupper(trim($this->input->post('name')));
 	$jk = strtoupper(trim($this->input->post('id_jk')));
 	$alamat = strtoupper(trim($this->input->post('alamat')));
  $notlp = trim($this->input->post('notlp'));
  $email = trim($this->input->post('email'));



 	$data['id_user'] = $id_user;
 	$data['username'] = $username;
 	$data['password'] = md5($password);
 	$data['level'] = $id_level;
  $data['name'] = $name;
 	$data['jk'] = $jk;
 	$data['alamat'] = $alamat;
  $data['notlp'] = $notlp;
  $data['email'] = $email;


 	$this->db->trans_start();
  $result = $this->model_app->checkEmailExists($email);
  if(empty($result)){
    $this->db->insert('user', $data);
  	$this->db->trans_complete();

    if ($this->db->trans_status() === FALSE)
  			{
  				$this->session->set_flashdata("msg", "<div class='alert bg-danger' role='alert'>
  			    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
  			    <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Data gagal tersimpan.
  			    </div>");
  				redirect('user/user_list');
  			} else
  			{
  				$this->session->set_flashdata("msg", "<div class='alert bg-success' role='alert'>
  			    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
  			    <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Data tersimpan. \n Username & Password : <b> $username
  			    </div>");
  				redirect('user/user_list');
  			}
  }else {
    $this->session->set_flashdata("msg", "<div class='alert bg-danger' role='alert'>
      <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
      <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Email sudah ada!.
      </div>");
      redirect('user/add');
  }




 }

 function edit($id)
 {

 	    $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/form_user";


        // $id_dept = trim($this->session->userdata('id_dept'));
        $id_user = trim($this->session->userdata('id_user'));



        // $id_dept = trim($this->session->userdata('id_dept'));
        $id_user = trim($this->session->userdata('id_user'));

        //notification
        //
        $sql_listticket = "SELECT COUNT(id_ticket) AS jml_list_ticket FROM ticket WHERE status = 3";
        $row_listticket = $this->db->query($sql_listticket)->row();
        //
        $data['notif_list_ticket'] = $row_listticket->jml_list_ticket;
        //
        // $sql_approvalticket = "SELECT COUNT(A.id_ticket) AS jml_approval_ticket FROM ticket A
        // LEFT JOIN sub_kategori B ON B.id_sub_kategori = A.id_sub_kategori
        // LEFT JOIN kategori C ON C.id_kategori = B.id_kategori
        // -- LEFT JOIN karyawan D ON D.nik = A.reported
        // LEFT JOIN bagian_departemen E ON E.id_bagian_dept = D.id_bagian_dept WHERE E.id_dept = $id_dept AND status = 1";
        // $row_approvalticket = $this->db->query($sql_approvalticket)->row();
        //
        // $data['notif_approval'] = $row_approvalticket->jml_approval_ticket;
        //
        $sql_assignmentticket = "SELECT COUNT(id_ticket) AS jml_assignment_ticket FROM ticket WHERE status = 3";
        $row_assignmentticket = $this->db->query($sql_assignmentticket)->row();
        //
        $data['notif_assignment'] = $row_assignmentticket->jml_assignment_ticket;

        //end notification

        $sql = "SELECT id_user,name,notlp,username,password,level,email,alamat,jk FROM user WHERE id_user ='$id'";
		    $row = $this->db->query($sql)->row();

		$data['url'] = "user/update";

		// $data['dd_karyawan'] = $this->model_app->dropdown_karyawan();
		// $data['id_karyawan'] = "";
    $data['dd_level'] = $this->model_app->dropdown_level();
    $data['id_level'] = $row->level;;

    $data['username'] = $row->username;
    $data['dd_jk'] = $this->model_app->dropdown_jk();
    $data['id_jk'] = $row->jk;;

    $pw =
    $data['id_user'] = "";
   	$data['password'] ="";
    $data['name'] = $row->name;


   	$data['alamat'] = $row->alamat;
    $data['notlp'] = $row->notlp;
    $data['email'] = $row->email;

		$data['flag'] = "edit";

        $this->load->view('template', $data);

 }

 function update()
 {

   $id_user = trim($this->session->userdata('id_user'));

  $username = trim($this->input->post('username'));
  $password = trim($this->input->post('password'));
  // $password = strtoupper(trim($this->input->post('password')));
  $id_level = strtoupper(trim($this->input->post('id_level')));
  $name = strtoupper(trim($this->input->post('name')));
  $jk = strtoupper(trim($this->input->post('id_jk')));
  $alamat = strtoupper(trim($this->input->post('alamat')));
  $notlp = trim($this->input->post('notlp'));
  $email = trim($this->input->post('email'));


  $data['username'] = $username;
  $data['password'] = md5($password);
  $data['level'] = $id_level;
  $data['name'] = $name;
  $data['jk'] = $jk;
  $data['alamat'] = $alamat;
  $data['notlp'] = $notlp;
  $data['email'] = $email;

 	$this->db->trans_start();

 	$this->db->where('id_user', $id_user);
 	$this->db->update('user', $data);



    // $result = $this->model_app->checkUsername($username);
    // if(empty($result)){
      $this->db->where('id_user', $id_user);
     	$this->db->update('user', $data);

      $this->db->trans_complete();

      if ($this->db->trans_status() === FALSE)
    			{
    				$this->session->set_flashdata("msg", "<div class='alert bg-danger' role='alert'>
    			    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    			    <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Data gagal tersimpan.
    			    </div>");
    				redirect('user/user_list');
    			} else
    			{
    				$this->session->set_flashdata("msg", "<div class='alert bg-success' role='alert'>
    			    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    			    <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Data tersimpan.
    			    </div>");
    				redirect('user/user_list');
    			}
    // }else {
    //   $this->session->set_flashdata("msg", "<div class='alert bg-danger' role='alert'>
    //     <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    //     <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Email sudah ada!.
    //     </div>");
    //     redirect('user/edit/');
    // }




 }



}
