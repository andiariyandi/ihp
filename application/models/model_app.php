<?php

class Model_app extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    //  ================= AUTOMATIC CODE ==================
    public function getkodeticket()
    {
        $query = $this->db->query("select max(id_ticket) as max_code FROM ticket");

        $row = $query->row_array();

        $max_id = $row['max_code'];
        $max_fix = (int) substr($max_id, 9, 4);

        $max_nik = $max_fix + 1;

        $tanggal = $time = date("d");
        $bulan = $time = date("m");
        $tahun = $time = date("Y");

        $nik = "T".$tahun.$bulan.$tanggal.sprintf("%04s", $max_nik);
        return $nik;
    }

    public function getusername()
    {
        $query = $this->db->query("select max(id_user) as max_code FROM user");

        $row = $query->row_array();

        $max_id = $row['max_code'];
        $max_fix = (int) substr($max_id, 1,4);

        $max_nik = $max_fix + 1;
        $char = "P";

        $username = $char.sprintf("%04s", $max_nik);
        return $username;
    }



     public function getkodeuser()
    {
        $query = $this->db->query("select max(id_user) as max_code FROM user");

        $row = $query->row_array();

        $max_id = $row['max_code'];
        $max_fix = (int) substr($max_id, 1, 4);

        $max_id_user = $max_fix + 1;

        $id_user = "U".sprintf("%04s", $max_id_user);
        return $id_user;
    }



    public function datalist_ticket()
    {

        $query = $this->db->query("SELECT A.nopen, A.reported_name, A.status, A.id_ticket, A.tanggal, B.nama_sub_kategori, C.nama_kategori
                                   FROM ticket A
                                   LEFT JOIN sub_kategori B ON B.id_sub_kategori = A.id_sub_kategori
                                   LEFT JOIN kategori C ON C.id_kategori = B.id_kategori
                                  ");
        return $query->result();

    }

    public function data_trackingticket($id)
    {

        $query = $this->db->query("SELECT A.tanggal, A.status, A.deskripsi, B.name
                                   FROM tracking A
                                   LEFT JOIN user B ON B.id_user = A.id_user
                                   WHERE A.id_ticket ='$id'");
        return $query->result();

    }


    public function datainformasi()
    {

        $query = $this->db->query("SELECT A.tanggal, A.subject, A.pesan, C.name, A.id_informasi
                                   FROM informasi A
                                   LEFT JOIN USER C ON C.id_user=  A.id_user
                                   WHERE A.status = 1");
        return $query->result();

    }

    public function datamyticket($id)
    {
        $query = $this->db->query("SELECT A.progress, A.tanggal_proses, A.tanggal_solved, A.id_teknisi, D.feedback, A.status, A.id_ticket, A.tanggal, B.nama_sub_kategori, C.nama_kategori
                                   FROM ticket A
                                   LEFT JOIN sub_kategori B ON B.id_sub_kategori = A.id_sub_kategori
                                   LEFT JOIN kategori C ON C.id_kategori = B.id_kategori
                                   LEFT JOIN history_feedback D ON D.id_ticket = A.id_ticket
                                   WHERE A.reported = '$id' ");
    return $query->result();
    }


    public function datamyassignment($id)
    {
        $query = $this->db->query("SELECT A.progress, A.status, A.id_ticket, A.reported_name, A.tanggal, A.id_teknisi, A.progress, B.nama_sub_kategori, C.nama_kategori
                                   FROM ticket A
                                   LEFT JOIN sub_kategori B ON B.id_sub_kategori = A.id_sub_kategori
                                   LEFT JOIN kategori C ON C.id_kategori = B.id_kategori
                                   WHERE A.id_teknisi = '$id' AND A.progress NOT IN (100)
                                   OR A.status IN (1,2,3)
                                   ");
        return $query->result();
    }

     public function dataapproval($id)
    {
    $query = $this->db->query("SELECT A.status, D.nama ,A.status, A.id_ticket, A.tanggal, B.nama_sub_kategori, C.nama_kategori
        FROM ticket A
        LEFT JOIN sub_kategori B ON B.id_sub_kategori = A.id_sub_kategori
        LEFT JOIN kategori C ON C.id_kategori = B.id_kategori
        LEFT JOIN karyawan D ON D.nik = A.reported
        LEFT JOIN bagian_departemen E ON E.id_bagian_dept = D.id_bagian_dept WHERE E.id_dept = $id AND A.status = 1 OR  A.status= 0");
    return $query->result();
    }

     public function datadepartemen()
    {
    $query = $this->db->query('SELECT * FROM departemen');
    return $query->result();
    }

     public function databagiandepartemen()
    {
    $query = $this->db->query('SELECT * FROM bagian_departemen A LEFT JOIN departemen B ON B.id_dept = A.id_dept ');
    return $query->result();
    }



    public function datateknisi()
    {
    $query = $this->db->query('SELECT A.point, A.id_teknisi, B.nama, B.jk, C.nama_kategori, A.status, A.point FROM teknisi A
                                LEFT JOIN karyawan B ON B.nik = A.nik
                                LEFT JOIN kategori C ON C.id_kategori = A.id_kategori

                                 ');
    return $query->result();
    }


    public function datareportteknisi($id)
    {
     $query = $this->db->query("SELECT A.progress, A.tanggal_proses, A.status, A.problem_summary, B.nama, D.nama_kategori, F.nama_dept  FROM ticket A
                                LEFT JOIN karyawan B ON B.nik = A.reported
                                LEFT JOIN sub_kategori C ON C.id_sub_kategori = A.id_sub_kategori
                                LEFT JOIN kategori D ON D.id_kategori = C.id_kategori
                                LEFT JOIN bagian_departemen E ON E.id_bagian_dept = B.id_bagian_dept
                                LEFT JOIN departemen F ON F.id_dept = E.id_dept
                                WHERE id_teknisi = '$id'"
                                 );
    return $query->result();
    }


    public function datauser()
    {
      $query = $this->db->query('SELECT A.username, A.level, A.id_user, A.name, A.password, A.alamat, A.jk, A.notlp, A.email
         FROM user A ');

      return $query->result();

    }

    public function datakategori()
    {
    $query = $this->db->query('SELECT * FROM kategori');
    return $query->result();
    }

    public function datanopen(){
    $query = $this->db->query('SELECT * FROM nopen');
    return $query->result();
    }

    public function dataassigment($id)
    {
    $query = $this->db->query('SELECT A.status, D.nama, C.id_kategori, A.id_ticket, A.tanggal, B.nama_sub_kategori, C.nama_kategori
                FROM ticket A
                LEFT JOIN sub_kategori B ON B.id_sub_kategori = A.id_sub_kategori
                LEFT JOIN kategori C ON C.id_kategori = B.id_kategori
                LEFT JOIN karyawan D ON D.nik = A.reported
                WHERE A.id_teknisi = "$id"');
    return $query->result();
    }

    public function datasubkategori()
    {
    $query = $this->db->query('SELECT * FROM sub_kategori A LEFT JOIN kategori B ON B.id_kategori = A.id_kategori ');
    return $query->result();
    }


    public function dropdown_departemen()
    {
        $sql = "SELECT * FROM Departemen ORDER BY nama_dept";
            $query = $this->db->query($sql);

            $value[''] = '-- PILIH --';
            foreach ($query->result() as $row){
                $value[$row->id_dept] = $row->nama_dept;
            }
            return $value;
    }

    public function dropdown_kategori()
    {
        $sql = "SELECT * FROM kategori ORDER BY nama_kategori";
        $query = $this->db->query($sql);

            $value[''] = '-- PILIH KATEGORI MAHASALAH --';
            foreach ($query->result() as $row){
                $value[$row->id_kategori] = $row->nama_kategori;
            }
            return $value;
    }

    public function dropdown_ruangan()
    {
        $sql = "SELECT * FROM ruangan ORDER BY nama_ruangan";
        $query = $this->db->query($sql);

            $value[''] = '-- PILIH --';
            foreach ($query->result() as $row){
                $value[$row->id_ruangan] = $row->nama_ruangan;
            }
            return $value;
    }

    public function dropdown_karyawan()
    {
        $sql = "SELECT A.nama, A.nik FROM karyawan A
                LEFT JOIN bagian_departemen B ON B.id_bagian_dept = A.id_bagian_dept
                LEFT JOIN departemen C ON C.id_dept = b.id_dept
                ORDER BY nama";
        $query = $this->db->query($sql);

            $value[''] = '-- PILIH --';
            foreach ($query->result() as $row){
                $value[$row->nik] = $row->nama;
            }
            return $value;
    }

    public function dropdown_jabatan()
    {
        $sql = "SELECT * FROM jabatan ORDER BY nama_jabatan";
        $query = $this->db->query($sql);

        $value[''] = '-- PILIH --';
        foreach ($query->result() as $row){
            $value[$row->id_jabatan] = $row->nama_jabatan;
        }
        return $value;
    }



    public function dropdown_bagian_departemen($id_departemen)
    {
        $sql = "SELECT * FROM bagian_departemen where id_dept ='$id_departemen' ORDER BY nama_bagian_dept";
        $query = $this->db->query($sql);

        $value[''] = '-- PILIH --';
        foreach ($query->result() as $row){
            $value[$row->id_bagian_dept] = $row->nama_bagian_dept;
        }
        return $value;
    }

    public function dropdown_sub_kategori($id_kategori)
    {
        $sql = "SELECT * FROM sub_kategori where id_kategori ='$id_kategori' ORDER BY nama_sub_kategori";
        $query = $this->db->query($sql);

        $value[''] = '-- PILIH SUB KATEGORI MAHASALAH--';
        foreach ($query->result() as $row){
            $value[$row->id_sub_kategori] = $row->nama_sub_kategori;
        }
        return $value;
    }

    function dropdown_teknisi()
    {

        $sql = "SELECT A.id_teknisi, B.nama, B.jk, C.nama_kategori, A.status, A.point FROM teknisi A
                                LEFT JOIN karyawan B ON B.nik = A.nik
                                LEFT JOIN kategori C ON C.id_kategori = A.id_kategori
                                ";
        $query = $this->db->query($sql);

        $value[''] = '-- PILIH --';
        foreach ($query->result() as $row){
            $value[$row->id_teknisi] = $row->nama;
        }
        return $value;

    }


    public function dropdown_jk()
    {
        $value[''] = '--PILIH--';
        $value['LAKI-LAKI'] = 'LAKI-LAKI';
        $value['PEREMPUAN'] = 'PEREMPUAN';

            return $value;
    }

    public function dropdown_level()
    {
        $value[''] = '--PILIH--';
        $value['ADMIN'] = 'ADMIN';
        $value['TEKNISI'] = 'TEKNISI';
            return $value;
    }

    function checkEmailExists($email)
    {
        $this->db->select("email");
        $this->db->from("user");
        $this->db->where("email", $email);

        $query = $this->db->get();


        return $query->result();
    }

    function checkUsername($username)
    {
        $this->db->select("username");
        $this->db->from("user");
        $this->db->where("username", $username);

        $query = $this->db->get();
        return $query->result();
    }

    function checkNopenExists($id_nopen)
    {
        $this->db->select("id_nopen");
        $this->db->from("nopen");
        $this->db->where("id_nopen", $id_nopen);
        $query = $this->db->get();
        return $query->result();
    }

    function checkTicket($id_ticket)
    {
        $this->db->select("id_ticket");
        $this->db->from("ticket");
        $this->db->where("id_ticket", $id_ticket);
        $query = $this->db->get();
        return $query->result();
    }




}
