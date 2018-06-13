<?php

class CabinetController extends Controller
{
    private $pageTpl = '/views/cabinet.tpl.php';

    public function __construct()
    {
        $this->model = new CabinetModel();
        $this->view = new View();
    }

    public function index() {
        var_dump($_SESSION);
        if (!$_SESSION['user'])
        {
            header("Location: /");
        }

        $ordersCount = $this->model->getOrdersCount();
        $this->pageData['ordersCount'] = $ordersCount;

        $usersCount = $this->model->getUsersCount();
        $this->pageData['usersCount'] = $usersCount;

        $productsCount = $this->model->getProductsCount();
        $this->pageData['productsCount'] = $productsCount;

        $userName = $this->model->getUserName($_SESSION['user']);
        $this->pageData['userName'] = $userName;

        $this->view->render($this->pageTpl,$this->pageData);
        $this->pageData['title'] = 'Личный кабинет' . $userName;

    }

    public function logout()
    {
        session_destroy();
        header("Location: /");
    }
}