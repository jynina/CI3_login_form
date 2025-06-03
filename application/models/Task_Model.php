<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Task_Model extends CI_Model{
    function fetch_data($session_uid)
    {
        
        $sql = 'SELECT * FROM tbl_tasks task LEFT JOIN tbl_users USER ON task.created_by = ? AND user.user_id = ? LEFT JOIN tbl_logs LOGS ON task.task_id = logs.task_id INNER JOIN tbl_event_types event ON event.event_id = logs.event_id JOIN tbl_status STATUS ON task.task_status = status.status_id GROUP BY task.task_id';
        
        return $this->db->query($sql, array($session_uid, $session_uid))->result();
    }

    public function add_task($data, $log_data)
    {
       $this->db->insert('tbl_tasks', $data);
       $this->db->insert('tbl_logs', $log_data);
       
       return;
    }

    public function remove_task($id, $session_uid, $log_data)
    {
        $sql = "UPDATE tbl_tasks SET task_status = ?, status = ?, updated_by = ?, updated_at = ? , deleted_by = ? , deleted_at = ? WHERE id = " . $id;
        $this->db->query($sql, array(5, 0, $session_uid, date("Y-m-d h:i:sa"), $session_uid, date("Y-m-d h:i:sa")));
        $this->db->insert('tbl_logs', $log_data);
    }

    public function archive_task($id, $session_uid, $log_data)
    {
        $sql = 'UPDATE tbl_tasks SET task_status = ?, updated_by = ?, updated_at = ? WHERE id = ' . $id;
        $this->db->query($sql, array(4, $session_uid, date("Y-m-d h:i:sa")));
        $this->db->insert('tbl_logs', $log_data);
    }

    public function retrieve_task($id, $session_uid, $log_data)
    {
        $sql = 'UPDATE tbl_tasks SET task_status = ?, updated_by = ?, updated_at = ? WHERE id = ?';
        $this->db->query($sql, array(1, $session_uid, date("Y-m-d h:i:sa"), $id));
        $this->db->insert('tbl_logs', $log_data);
    }


    function update_task($data, $session_uid, $log_data)
    {
        $sql = "UPDATE tbl_tasks SET task_name = ?, task_status = ?, task_start = ?, task_due = ?, task_desc = ?, task_notes = ?, updated_by = ?, updated_at = ? WHERE id = " . $data['rowId'];
        $this->db->query($sql, array($data['task_name'], $data['editTaskStatus'], $data['task_start'], $data['task_due'], $data['task_desc'], $data['task_notes'], $session_uid, date('Y-m-d h:i:sa')));
        $this->db->insert('tbl_logs', $log_data);
    }
}

?>