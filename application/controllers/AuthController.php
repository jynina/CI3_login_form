<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AuthController extends CI_Controller
{
    public function __construct()
    {

        parent::__construct();
    }

    public function display_register(){

        $this->load->view('template/header.php');
        $this->load->view('Auth/register.php');
        $this->load->view('template/footer.php');
    }

    public function display_login(){
        $this->load->view('template/header.php');
        $this->load->view('Auth/login.php');
        $this->load->view('template/footer.php');
    }

    public function register()
    {

        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required|alpha'); //trim = no whitespace, alpha = only alphabets trim|required|alpha
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|alpha'); // trim|required|alpha
        $this->form_validation->set_rules('register_email', 'Email ID', 'trim|required|valid_email|is_unique[tbl_users.email]'); //trim|required|valid_email|is_unique[tbl_users.email]
        $this->form_validation->set_rules('register_password', 'Password', 'trim|required');//trim|required
        $this->form_validation->set_rules('repeat_password', 'Repeat Password', 'trim|required|matches[register_password]');//trim|required|matches[password]

        if($this->form_validation->run())
        {
            $data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'email' => $this->input->post('register_email'),
                'password' => password_hash($this->input->post('register_password'), PASSWORD_BCRYPT),
                'Status' => 1,
                'Created_at' => date("Y-m-d h:i:sa"),
                'Updated_at' => date("Y-m-d h:i:sa")
            );
            $register_user = new Auth_Model;
            $register_user->register_user($data);
            
                echo '<div class="alert alert-info">' . 'SUCCESS. Please wait for a few seconds...' . '</div>';
                header("refresh:3;".base_url('open_login'));  
        }
        else
        {
            $this->display_register();
           
        }
    }


    public function login()
    {
        $this->form_validation->set_rules('login_email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('login_password', 'Password', 'required');

        if ($this->form_validation->run())
        {
            $data = array(
                'email' => strtolower($this->input->post('login_email')),
                'password' => $this->input->post('login_password')
            );
            $password = $this->input->post('login_password');
            $login_user = new Auth_Model;
            $validate = $login_user->login_user($data);
            echo "<script>console.log(". $validate . ")</script>";
            if (isset($validate))
            {
                $validate = json_decode($validate, true);
                $stored_hash = $validate['password'];

                if (password_verify($password, $stored_hash))
                {
                    $this->session->set_userdata('id', $validate['id']);
                    $this->session->set_userdata('first_name', $validate['first_name']);
                    $this->session->set_userdata('last_name', $validate['last_name']);
                    
                    header("location:" . base_url('dashboard'));
                }
                else
                {
                    $this->session->set_flashdata('error','Invalid login details. Please try again.');
                    $this->display_login();

                }
            }
        }
        else
        {
            $this->display_login();
        }   
    }

    public function logout()
    {
        $this->session->unset_userdata('id');
        $this->session->sess_destroy();
        redirect(base_url());
        
    }

}

?>