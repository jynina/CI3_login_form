<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class TaskController extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function index()
    {  
        $this->load->view('upload_form', array('error' => ' ' ));
    }


    public function add_task()
    {
        $config = array(
            'upload_path' => "./uploads/",
            'allowed_types' => '*',
            'overwrite' => 1
        );

        $this->load->library('upload', $config);
        

        $task_data = array
        (
            'task_name' => $this->input->post('task_name'),
            'task_desc' => $this->input->post('task_desc'),
            'task_start' => $this->input->post('task_start'),
            'task_due' => $this->input->post('task_due'),
            'task_notes' => $this->input->post('task_notes'),
            'task_status' => 1,
            'status' => 1,
            'created_at' => date("Y-m-d h:i:sa"),
            'created_by' => $this->session->userdata('id'),
        );

        $log_data = array
        (
            'created_at' => date("Y-m-d h:i:sa"),
            'user_id' => $this->session->userdata('id'),
            'event_id' => 1
        );

        $add_task = new Task_Model;
        $add_task->add_task($task_data, $log_data);

        

        header("location:" . base_url('dashboard'));
        exit;
    }

    public function delete_task()
    {
        $id = $this->input->post('id');
        $session_uid = $this->session->userdata('id');
        $log_data = array
        (
            'created_at' => date("Y-m-d h:i:sa"),
            'task_id' => $id,
            'user_id' => $this->session->userdata('id'),
            'event_id' => 3
        );
        if($id){
            $delete_row = new Task_Model;
            $delete_row->remove_task($id, $session_uid, $log_data);
            header("location:" . base_url('dashboard'));
            exit;
        }
        header("location:" . base_url('dashboard'));
        exit;
       
    }
    public function update_task()
    {
        $session_uid = $this->session->userdata('id');

        $task_data = array
        (
            'rowId' => $this->input->post('rowId'),
            'task_name' => $this->input->post('task_name'),
            'task_desc' => $this->input->post('task_desc'),
            'editTaskStatus' => $this->input->post('editTaskStatus'),
            'task_start' => $this->input->post('task_start'),
            'task_due' => $this->input->post('task_due'),
            'task_notes' => $this->input->post('task_notes')
        );
        
        $log_data = array
        (
            'created_at' => date("Y-m-d h:i:sa"),
            'user_id' => $this->session->userdata('id'),
            'event_id' => 3
        );

        $update_task = new Task_Model;
        $update_task->update_task($task_data, $session_uid, $log_data);

        header("location:" . base_url('dashboard'));
        exit;
    }



    public function archive_task()
    {

        $id = $this->input->post('id');
        $session_uid = $this->session->userdata('id');
        $log_data = array
        (
            'created_at' => date("Y-m-d h:i:sa"),
            'task_id' => $id,
            'user_id' => $this->session->userdata('id'),
            'event_id' => 4
        );
        if($id){
            $archive_row = new Task_Model;
            $archive_row->archive_task($id, $session_uid, $log_data);
            header("location:" . base_url('dashboard'));
            exit;
        }

        header("location:" . base_url('dashboard'));
        exit;
            
    }

    public function fetch_data($session_uid)
    {
        $data = $this->Task_Model->fetch_data($session_uid);
        echo json_encode($data);
        die;
    }

    public function retrieve_task(){
        $id = $this->input->post('id');
        $session_uid = $this->session->userdata('id');
        $log_data = array
        (
            'created_at' => date("Y-m-d h:i:sa"),
            'task_id' => $id,
            'user_id' => $this->session->userdata('id'),
            'event_id' => 5
        );
        // if($id){
            $retrieve_row = new Task_Model;
            $retrieve_row->retrieve_task($id, $session_uid, $log_data);
            header("location:" . base_url('dashboard'));
            exit;
        // }

        // header("location:" . base_url('dashboard'));
        // exit;
    }

    


}


?>