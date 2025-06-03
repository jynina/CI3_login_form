<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $firstName = $this->session->userdata('first_name');
        $session_uid = $this->session->userdata('id');
        $data['rows'] = $this->Task_Model->fetch_data($session_uid);
        $this->load->view('template/header.php', $data);
        $this->load->view('dashboard.php', $data);
        $this->load->view('template/footer.php');

    }
}

?>