<?php

class RegisterController extends Controller
{
    private $pageTpl = '/views/register.tpl.php';

    public function __construct()
    {
        $this->model = new RegisterModel();
        $this->view = new View();
    }

    public function index() {
        $this->pageData['title'] = 'Register';
        $this->view->render($this->pageTpl, $this->pageData);

        if(!empty($_REQUEST['password'])) {
            $this->model->register();
        }
    }
}