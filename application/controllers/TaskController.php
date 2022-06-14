<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TaskController extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->database();
    }

  public function index()
  {
    $tasks = $this->db->get('tasks')->result();
    $this->load->view('task/index', ['tasks' => $tasks]);
  }

  public function create()
  {
    $this->load->view('task/create');
  }

  public function edit($id)
  {
    $task = $this->db->where(['id' => $id])->get('tasks')->row();
    $this->load->view('task/edit', ['task' => $task]);
  }

  public function store()
  {
      $this->load->library('form_validation');
      $this->form_validation->set_rules('title', 'Title', 'required');
      $this->form_validation->set_rules('description', 'Description','required');

      if ($this->form_validation->run()) {
        $task = array (
          'title' => $this->input->post('title'),
          'description' => $this->input->post('description'),
        );

        $this->db->insert('tasks', $task);
      } else {
        $errors = $this->form_validation->error_array();
        $this->session->set_flashdata('errors', $errors);
        redirect(base_url('task/create'));
      }

      redirect('/task');
  }

  public function update($id)
  {
    $this->load->library('form_validation');
    $this->form_validation->set_rules('title', 'Title', 'required');
    $this->form_validation->set_rules('description', 'Description', 'required');

    if ($this->form_validation->run()) {
      $task = array (
        'title' => $this->input->post('title'),
        'description' => $this->input->post('description'),
      );

       $this->db->where(['id' => $id])->update('tasks', $task);
    } else {
      $errors = $this->form_validation->error_array();
      $this->session->set_flashdata('errors', $errors);
      redirect(base_url('task/edit/'. $id));
    }

     redirect('/task');
  }

  public function show($id) {
     $task = $this->db->where(['id' => $id])->get('tasks')->row();
     $this->load->view('task/show',['task' => $task]);
  }

  public function delete($id)
  {
     $this->db->where(['id' => $id])->delete('tasks');

     redirect('/task');
  }

}