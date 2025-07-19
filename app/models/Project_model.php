<?php
class Project_model
{
  private $table = 'project';
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }
  public function getAllProject()
  {
    $this->db->query('SELECT * FROM 
                        step st
                      JOIN 
                        project pj ON st.id_project = pj.id_project
                      JOIN
                        category cg ON pj.id_category = cg.id_category
                      JOIN
                        customer ct ON pj.id_customer = ct.id_customer
                      GROUP BY project');
    return $this->db->resultSet();
  }

  public function getAllCustomer()
  {
    $this->db->query('SELECT * FROM customer');
    return $this->db->resultSet();
  }

  public function getAllCategory()
  {
    $this->db->query('SELECT * FROM category');
    return $this->db->resultSet();
  }

  public function getDetailProject($id)
  {
    $this->db->query('SELECT * FROM 
                        operate op
                      JOIN 
                        product pd ON op.id_product = pd.id_product
                      JOIN
                        project pj ON pd.id_project = pj.id_project
                      JOIN
                        customer ct ON pj.id_customer = ct.id_customer
                      JOIN
                        category cg ON pj.id_category = cg.id_category
                      JOIN
                        step st ON op.id_step = st.id_step
                      WHERE 
                        pj.id_project = :id
                      GROUP BY 
                        pd.id_product;');
    $this->db->bind('id', $id);
    return $this->db->resultSet();
  }

  public function getProjectById($id)
  {
    $this->db->query('SELECT * FROM 
                        operate op
                      JOIN 
                        product pd ON op.id_product = pd.id_product
                      JOIN
                        project pj ON pd.id_project = pj.id_project
                      JOIN
                        customer ct ON pj.id_customer = ct.id_customer
                      JOIN
                        category cg ON pj.id_category = cg.id_category
                      JOIN
                        step st ON op.id_step = st.id_step
                      WHERE pj.id_project=:id');
    $this->db->bind('id', $id);
    return $this->db->single();
  }

  public function getCountStep($id)
  {
    $this->db->query('SELECT * FROM 
                        step
                      WHERE id_project=:id');
    $this->db->bind('id', $id);
    return $this->db->resultSet();
  }

  public function getCountOperate($id_step)
  {
    $this->db->query('SELECT * FROM operate WHERE id_step = :id_step');
    $this->db->bind('id_step', $id_step);
    return $this->db->resultSet();
  }

  public function getDetailProduct($id)
  {
    $this->db->query('SELECT * FROM 
                        operate op
                      JOIN 
                        product pd ON op.id_product = pd.id_product
                      JOIN
                        project pj ON pd.id_project = pj.id_project
                      JOIN
                        customer ct ON pj.id_customer = ct.id_customer
                      JOIN
                        category cg ON pj.id_category = cg.id_category
                      JOIN
                        step st ON op.id_step = st.id_step
                      WHERE 
                        pd.id_product = :id;');
    $this->db->bind('id', $id);
    return $this->db->resultSet();
  }

    public function getProductById($id)
  {
    $this->db->query('SELECT * FROM 
                        operate op
                      JOIN 
                        product pd ON op.id_product = pd.id_product
                      JOIN
                        project pj ON pd.id_project = pj.id_project
                      JOIN
                        customer ct ON pj.id_customer = ct.id_customer
                      JOIN
                        category cg ON pj.id_category = cg.id_category
                      JOIN
                        step st ON op.id_step = st.id_step
                      WHERE 
                        pd.id_product = :id;');
    $this->db->bind('id', $id);
    return $this->db->single();
  }

  public function getAllStep($id_project, $id_product)
  {
    $this->db->query('SELECT *
                      FROM step st
                      LEFT JOIN operate op ON st.id_step = op.id_step
                      LEFT JOIN user us ON op.nik_user = us.nik
                      LEFT JOIN product pd ON op.id_product = pd.id_product
                      WHERE st.id_project = :id_project and pd.id_product =:id_product
                      GROUP BY st.id_step;
                      ');
    $this->db->bind('id_project', substr($id_project, 0, 11));
    $this->db->bind('id_product', $id_product);
    return $this->db->resultSet();
  }

  public function tambahDataProject($data)
  {
    $query = "INSERT INTO project VALUES
    (:id_project, :id_category, :id_customer, :project, :start_date, :due_date, :status, :progress)";

    $this->db->query($query);
    $this->db->bind('id_project', $data['id_project']);
    $this->db->bind('id_category', $data['id_category']);
    $this->db->bind('id_customer', $data['id_customer']);
    $this->db->bind('project', $data['project']);
    $this->db->bind('start_date', $data['start_date']);
    $this->db->bind('due_date', $data['due_date']);
    $this->db->bind('status', $data['status']);
    $this->db->bind('progress', $data['progress']);

    $this->db->execute();

    return $this->db->rowCount();
  }

  public function hapusDataProject($id)
  {
    $query = "DELETE FROM project WHERE id_project=:id";
    $this->db->query($query);
    $this->db->bind('id', $id);

    $this->db->execute();

    return $this->db->rowCount();
  }

  public function ubahDataProject($data)
  {
    $query = "UPDATE project SET
                id_category = :id_category,
                id_customer = :id_customer,
                project = :project,
                start_date = :start_date,
                due_date = :due_date,
                status = :status,
                progress = :progress,
              WHERE id_project = :id";

    $this->db->query($query);
    $this->db->bind('id_category', $data['id_category']);
    $this->db->bind('id_customer', $data['id_customer']);
    $this->db->bind('project', $data['project']);
    $this->db->bind('start_date', $data['start_date']);
    $this->db->bind('due_date', $data['due_date']);
    $this->db->bind('status', $data['status']);
    $this->db->bind('progress', $data['progress']);
    $this->db->bind('id', $data['id']);

    $this->db->execute();

    return $this->db->rowCount();
  }

  public function cariDataMahasiswa()
  {
    $keyword = $_POST['keyword'];
    $query = "SELECT * FROM project WHERE project LIKE :keyword";
    $this->db->query($query);
    $this->db->bind('keyword', "%$keyword%");
    return $this->db->resultSet();
  }


  public function getProducyByProjectId ($id_project)  {
     $this->db->query("SELECT prd.model,
                    prd.spesifikasi,
                    concat(prd.qty, ' ', prd.uom) qty,
                    prj.id_project,
                    prd.id_product,
                    opr.id_step
              FROM project prj
                  JOIN product prd
                      on prd.id_project = prj.id_project
                  JOIN operate opr
                      on prd.id_product = opr.id_product
                  join step stp
                      on opr.id_step = stp.id_step
              WHERE prj.id_project =:id_project
              GROUP by prd.id_product");
    $this->db->bind('id_project', $id_project);
    return $this->db->resultSet();
  }

  public function getOperatebyProduct($id_product){
    $this->db->query("SELECT * FROM operate opr
                      JOIN step stp on opr.id_step = stp.id_step
                      where opr.id_product = :id_product");
    $this->db->bind('id_product', $id_product);
    return $this->db->resultSet();
  }
}
