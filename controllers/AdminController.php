<?php

class AdminController extends Controller
{
    private $pageTpl = '/views/admin.tpl.php';

    public function __construct()
    {
        $this->model = new AdminModel();
        $this->view = new View();
    }

    public function index() {
        if (!$_SESSION['user'])
        {
            header("Location: /");
        }
        else if (!$this->model->checkUserRoleId($_SESSION['user'])) {
            header("Location: /cabinet");
        }

        else {
            $this->pageData['title'] = 'Cabinet';

            $ordersCount = $this->model->getOrdersCount();
            $this->pageData['ordersCount'] = $ordersCount;

            $usersCount = $this->model->getUsersCount();
            $this->pageData['usersCount'] = $usersCount;

            $productsCount = $this->model->getProductsCount();
            $this->pageData['productsCount'] = $productsCount;

            $userName = $this->model->getUserName($_SESSION['user']);
            $this->pageData['userName'] = $userName;

            $this->view->render($this->pageTpl, $this->pageData);
        }
    }

    public function logout()
    {
        session_destroy();
        header("Location: /");
    }
}