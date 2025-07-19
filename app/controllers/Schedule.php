<?php
class Schedule extends Controller
{
  public function index()
  {
    $data['judul'] = 'Schedule Project';
    $data['proj'] = $this->model('Schedule_model')->getAllProject();
    $data['cust'] = $this->model('Schedule_model')->getAllCustomer();
    $data['cate'] = $this->model('Schedule_model')->getAllCategory();
    $data['pic'] = $this->model('Schedule_model')->getUserTeamMember();
    $this->view('templates/header', $data);
    $this->view('schedule/index', $data);
    $this->view('templates/footer');
  }

  public function detail_perdate($date)
  {
    $data['judul'] = 'Schedule Project';
    $data['proj'] = $this->model('Schedule_model')->getAllProject();
    $data['cust'] = $this->model('Schedule_model')->getAllCustomer();
    $data['cate'] = $this->model('Schedule_model')->getAllCategory();
    $data['pic'] = $this->model('Schedule_model')->getUserTeamMember();
    $data['date'] = $this->model('Schedule_model')->getDate($date);
    $this->view('templates/header', $data);
    $this->view('schedule/detail_perdate', $data);
    $this->view('templates/footer');
  }

  public function detail_perpic($date, $name)
  {
    $data['judul'] = 'Schedule Project';
    $data['proj'] = $this->model('Schedule_model')->getAllProject();
    $data['cust'] = $this->model('Schedule_model')->getAllCustomer();
    $data['cate'] = $this->model('Schedule_model')->getAllCategory();
    $data['pic'] = $this->model('Schedule_model')->getUserTeamMember();
    $data['date'] = $this->model('Schedule_model')->getDate($date);
    $data['name'] = $this->model('Schedule_model')->getName($name);
    $this->view('templates/header', $data);
    $this->view('schedule/detail_perpic', $data);
    $this->view('templates/footer');
  }

}
