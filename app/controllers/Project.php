<?php
class Project extends Controller
{
  public function index()
  {
    $data['judul'] = 'Daftar Project';
    $data['proj'] = $this->model('Project_model')->getAllProject();
    $data['cust'] = $this->model('Project_model')->getAllCustomer();
    $data['cate'] = $this->model('Project_model')->getAllCategory();
    $this->view('templates/header', $data);
    $this->view('project/index', $data);
    $this->view('templates/footer');
  }

public function details($id)
{
  $data['judul'] = 'Detail Project';
  $data['Dproj'] = $this->model('Project_Model')->getDetailProject($id);
  $data['projID'] = $this->model('Project_Model')->getProjectById($id);
  $data['Cstep'] = $this->model('Project_Model')->getCountStep($id);

  // Ambil operate per step
  $data['Cope'] = [];
  foreach ($data['Cstep'] as $step) {
    $data['Cope'][$step['id_step']] = $this->model('Project_Model')->getCountOperate($step['id_step']);
  }

  $this->view('templates/header', $data);
  $this->view('project/detail', $data);
  $this->view('templates/footer');
}


  public function detail_product($id, $id_product)
{
  $data['judul'] = 'Detail Product';
  $data['Dprod'] = $this->model('Project_Model')->getDetailProduct($id);
  $data['prodID'] = $this->model('Project_Model')->getProductById($id);
  $data['Astep'] = $this->model('Project_Model')->getAllStep($id, $id_product);
  $this->view('templates/header', $data);
  $this->view('project/detail_product', $data);
  $this->view('templates/footer');
}

public function schedule($id)
{
  $data['judul'] = 'Schedule Project';
  $data['Dproj'] = $this->model('Project_Model')->getDetailProject($id);
  $data['projID'] = $this->model('Project_Model')->getProjectById($id);
  $data['Cstep'] = $this->model('Project_Model')->getCountStep($id);

  // Ambil operate per step
  $data['Cope'] = [];
  foreach ($data['Cstep'] as $step) {
    $data['Cope'][$step['id_step']] = $this->model('Project_Model')->getCountOperate($step['id_step']);
  }

  $this->view('templates/header', $data);
  $this->view('project/schedule ', $data);
  $this->view('templates/footer');
}

  public function tambah()
  {
    if ($this->model('Mahasiswa_model')->tambahDataMahasiswa($_POST) > 0) {
      Flasher::setFlash('berhasil', 'ditambahkan', 'success');
      header('Location: ' . BASEURL . '/mahasiswa');
      exit;
    } else {
      Flasher::setFlash('gagal', 'ditambahkan', 'danger');
      header('Location: ' . BASEURL . '/mahasiswa');
      exit;
    }
  }

  public function hapus($id)
  {
    if ($this->model('Mahasiswa_model')->hapusDataMahasiswa($id) > 0) {
      Flasher::setFlash('berhasil', 'dihapus', 'success');
      header('Location: ' . BASEURL . '/mahasiswa');
      exit;
    } else {
      Flasher::setFlash('gagal', 'dihapus', 'danger');
      header('Location: ' . BASEURL . '/mahasiswa');
      exit;
    }
  }

  public function getUbah()
  {
    echo json_encode($this->model('Mahasiswa_model')->getMahasiswaById($_POST['id']));
  }

  public function ubah()
  {
    if ($this->model('Mahasiswa_model')->ubahDataMahasiswa($_POST) > 0) {
      Flasher::setFlash('berhasil', 'diubah', 'success');
      header('Location: ' . BASEURL . '/mahasiswa');
      exit;
    } else {
      Flasher::setFlash('gagal', 'diubah', 'danger');
      header('Location: ' . BASEURL . '/mahasiswa');
      exit;
    }
  }

  public function cari()
  {
    $data['judul'] = 'Daftar Mahasiswa';
    $data['mhs'] = $this->model('Mahasiswa_model')->cariDataMahasiswa();
    $this->view('templates/header', $data);
    $this->view('mahasiswa/index', $data);
    $this->view('templates/footer');
  }

  function detail($id){
    $data['title'] = 'Detail Product';
    $data['product'] = $this->model('Project_Model')->getProjectById($id);
    $data['product_list'] = $this->model('Project_model')->getProducyByProjectId($id);
    $data['steps'] = $this->model('Project_Model')->getCountStep($id);
    $data['operate'] = [];
    
    foreach ($data['steps'] as $step) {

      $data['operate'][$step['id_step']] = $this->model('Project_Model')->getCountOperate($step['id_step']);
      
    }
    $this->view('templates/header', $data);
    $this->view('project/detail', $data);
    $this->view('templates/footer');
  }
}
