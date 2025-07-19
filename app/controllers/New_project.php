<?php
class New_project extends Controller
{
  public function index()
  {
    $data['judul'] = 'Tambah Project';
    $data['proj'] = $this->model('New_project_model')->getAllProject();
    $data['cust'] = $this->model('New_project_model')->getAllCustomer();
    $data['cate'] = $this->model('New_project_model')->getAllCategory();
    $this->view('templates/header', $data);
    $this->view('new_project/index', $data);
    $this->view('templates/footer');
  }

}
