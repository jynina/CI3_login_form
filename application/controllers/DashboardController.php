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
        $this->load->view('template/header.php');
        $this->load->view('dashboard.php', ['first_name'=>$firstName]);
        $this->load->view('template/footer.php');

    }

    
}

?>