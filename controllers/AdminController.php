<?php

class AdminController extends \system\Controller
{
    private $adminModel;

    public function __construct()
    {
        parent::__construct();
        $this->adminModel = new AdminModel();
    }

    public function index()
    {
        $this->view->title = 'admin';
        if (isset($_POST['search'])) {
            $data_not_empty = array_filter($_POST, function ($value) {
                return !empty($value);
            });
            if (!empty($data_not_empty)) {
                $this->view->kunden = $this->adminModel->getCustomerWhere($data_not_empty);
            } else {
                $this->view->kunden = $this->adminModel->getAll();
            }
        } else {
            $this->view->kunden = $this->adminModel->getAll();
        }
        $this->view->render('admin/index');
    }

    public function delete($id)
    {
        if ($this->adminModel->deleteCustomerById($id) > 0) {
            $this->Redirect(BASE_URL . 'admin?delete=true', true);
        } else {
            $this->Redirect(BASE_URL . 'admin?delete=false', true);
        }
    }

    private function filterArray($data)
    {
        return array_filter($data, function ($value) {
            return !empty($value);
        });
    }

    public function insert()
    {
        $this->view->message = "";

        if (isset($_POST['name'])) {
            if (!empty($this->filterArray($_POST))) {
                if ($this->adminModel->insertCustomer($this->filterArray($_POST))) {
                    $this->view->message = "Daten wurden gespeichert";
                    $this->Redirect(BASE_URL . 'admin/edit/' . $this->adminModel->getLastId() . '?success=1', true);
                } else {
                    $this->view->message = "Daten wurden nicht gespeichert";
                }
            } else {
                $this->view->render('admin/new');
            }

        } else {
            $this->view->render('admin/new');
        }
    }

    public function edit($id)
    {
        echo 'kunde';
        $kunde = $this->adminModel->getCustomerById($id)[0];
        $this->view->kunde = $kunde;
        $this->view->title = 'Kunde ' . $id;
        $this->view->render('admin/edit');
    }

    function Redirect($url, $permanent = false)
    {
        if (headers_sent() === false) {
            header('Location: ' . $url, true, ($permanent === true) ? 301 : 302);
        }
        exit();
    }


    public function update($id)
    {
        /*
        $data = [
            'id' => intval($_POST['id']),
            'firstname' => $_POST['firstname'],
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'telephone' => $_POST['telephone'],
            'street' => $_POST['street'],
            'city' => $_POST['city'],
            'plz' => $_POST['plz'],
            'country' => $_POST['country'],
        ];
        */
        if (!empty($this->filterArray($_POST))) {
            if ($this->adminModel->setCustomerById($id, $_POST)) {
                $this->Redirect(BASE_URL . 'admin/edit/' . $id . '?success=1', true);
            } else {
                $this->Redirect(BASE_URL . 'admin/edit/' . $id . '?success=0', true);
            }
        }


    }
}

?>