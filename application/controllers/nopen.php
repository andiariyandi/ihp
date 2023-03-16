<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nopen extends CI_Controller {

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


 function nopen_list()
 {

 	    $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/nopen";


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
        $data['link'] = "nopen/hapus";

        $datanopen = $this->model_app->datanopen();
	      $data['datanopen'] = $datanopen;

        $this->load->view('template', $data);

 }

  function hapus()
 {
 	$id = $_POST['id'];

 	$this->db->trans_start();

 	$this->db->where('id_nopen', $id);
 	$this->db->delete('nopen');

 	$this->db->trans_complete();

 }

 function add()
 {

 	    $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/form_nopen";

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

        $data['id_nopen'] = "";
		    $data['nama'] = "";
        $data['tipe'] = "";


		$data['url'] = "nopen/save";


        $this->load->view('template', $data);

 }

 function save()
 {

 	$id_nopen = strtoupper(trim($this->input->post('id_nopen')));
  $nama= strtoupper(trim($this->input->post('nama')));
  $tipe = strtoupper(trim($this->input->post('tipe')));


 	$data['id_nopen'] = $id_nopen;
$data['nama'] = $nama;
$data['tipe'] = $tipe;

 	$this->db->trans_start();

 	$this->db->insert('nopen', $data);

 	$this->db->trans_complete();

 	if ($this->db->trans_status() === FALSE)
			{
				$this->session->set_flashdata("msg", "<div class='alert bg-danger' role='alert'>
			    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			    <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Data gagal tersimpan.
			    </div>");
				redirect('nopen/add');
			} else
			{
				$this->session->set_flashdata("msg", "<div class='alert bg-success' role='alert'>
			    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			    <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Data  tersimpan.
			    </div>");
				redirect('nopen/nopen_list');
			}

 }

 function edit($id)
 {

 	    $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/form_nopen";

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

        $sql = "SELECT * FROM nopen WHERE id_nopen = '$id'";
		$row = $this->db->query($sql)->row();

		$data['url'] = "nopen/update";

		$data['id_nopen'] = $id;
		$data['nama'] = $row->nama;
    	$data['tipe'] = $row->tipe;


        $this->load->view('template', $data);

 }

 function update()
 {

 	$id_nopen = strtoupper(trim($this->input->post('id_nopen')));
 	$nama = strtoupper(trim($this->input->post('nama')));

 	$tipe = strtoupper(trim($this->input->post('tipe')));

 	$data['id_nopen'] = $id_nopen;
   	$data['nama'] = $nama;
   	$data['tipe'] = $tipe;

 	$this->db->trans_start();

 	$this->db->where('id_nopen', $id_nopen);
 	$this->db->update('nopen', $data);

 	$this->db->trans_complete();

 	if ($this->db->trans_status() === FALSE)
			{
				$this->session->set_flashdata("msg", "<div class='alert bg-danger' role='alert'>
			    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			    <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Data gagal tersimpan.
			    </div>");
				redirect('nopen/nopen_list');
			} else
			{
				$this->session->set_flashdata("msg", "<div class='alert bg-success' role='alert'>
			    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			    <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Data tersimpan.
			    </div>");
				redirect('nopen/nopen_list');
			}

 }

 function checkKate(){

 }



}
