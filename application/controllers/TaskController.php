<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TaskController extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('tasks_m');
    }

  private function dd($data)
  {
    echo "<pre>";
    die(print_r($data));
    echo "</pre>";
  }

  public function index()
  {
    $params=[];
    
    $tasks = $this->tasks_m->get_all_tasks($params);
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
      $this->tasks_m->create_task();

      redirect('/task');
  }

  public function update($id)
  {
    $this->tasks_m->update_task($id);

     redirect('/task');
  }

  public function show($id) {
    $task = $this->tasks_m->get_task($id);
    $this->load->view('task/show',['task' => $task]);
  }

  public function delete($id)
  {
     $this->tasks_m->delete_task($id);
     redirect('/task');
  }

  public function setEOTM($id)
  {
    $this->tasks_m->set_eotm($id);
    redirect('/task');
  }

}