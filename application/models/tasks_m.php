<?php
class Tasks_m extends CI_Model {
    protected $_table = 'tasks';

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function lq()
    {
        return $this->db->last_query();
    }

    public function get_all_tasks($params=[])
    {
        if(!empty($params['where']))
        {
            $this->db->where($params['where']);
        }

        $result = $this->db->get('tasks')->result();

        return $result;
    }

    public function get_task($id)
    {
        $task = $this->db->where('id', $id)->get('tasks')->result();

        return $task;
    }

    public function create_task()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('description', 'Description','required');

        if ($this->form_validation->run())
        {
            $task = array (
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d'),
            );

            $this->db->insert('tasks', $task);
        }
        else
        {
            $errors = $this->form_validation->error_array();
            $this->session->set_flashdata('errors', $errors);
            redirect(base_url('task/create'));
        }
    }

    public function update_task($id)
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');

        if ($this->form_validation->run())
        {
            $task = array (
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
                'updated_at' => date('Y-m-d'),
            );

            $this->db->where('id', $id)->update('tasks', $task);
        } 
        else
        {
            $errors = $this->form_validation->error_array();
            $this->session->set_flashdata('errors', $errors);
            redirect(base_url('task/edit/'. $id));
        }
    }

    public function delete_task($id)
    {
        $task = $this->db->where('id', $id)->delete('tasks');

        return $task;
    }

    public function set_eotm($id)
    {
        $employee_of_the_month = $this->input->post('employee_of_the_month');

        $set = [
            "is_eotm" => $employee_of_the_month,
            'updated_at' => date('Y-m-d'),
        ];

        $this->db->where('id', $id)->update('tasks', $set);

        return $task;
    }
}