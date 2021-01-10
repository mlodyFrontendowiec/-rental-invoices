<?php

declare(strict_types=1);
namespace App\Controller;

use App\View;
use App\Model\Model;

class Controller
{
    private array $get ;
    private array $post;
    private View $view;
    private Model $model;
    public function __construct(array $data)
    {
        $this->get =$data['get'];
        $this->post =$data['post'];
        $this->view = new View();
        $this->model = new Model();
        $this->showPage();
    }
    public function showPage():void
    {
        switch ($this->get["action"] ?? "login") {
            case "login":
                $this->view->render("login");
            break;
            case "validateLogin":
                $this->model->validateLogin($this->post);
            break;
            case "userPanel":
               $rows = $this->model->getBills();
               
                $data = $this->model->getBillsData($rows);
                
               $dataBills =  $this->model->getBillsAndUsers($data);
          

                $this->view->render("userPanel", $dataBills);
            break;
            case "createClient":
                $this->view->render("createClient");
            break;
            case "logoutUser":
                $this->model->logoutUser();
            break;
            case "addClient":
                $this->model->addClient($this->post);
            break;
            case "allClients":
               $clients =  $this->model->getClients();
                $this->view->render("allClients", $clients);
            break;
            case "deleteUser":
                $this->model->deleteUser($this->get);
            break;
            case "deleteService":
                $this->model->deleteService($this->get);
            break;
            case "editClient":
                if ($_SERVER['REQUEST_METHOD']== 'GET') {
                    $client = $this->model->getClient($this->get);
                    $this->view->render("editClient", $client);
                }
                if ($_SERVER['REQUEST_METHOD']== 'POST') {
                    $this->model->editClient($this->post, $this->get);
                }
            break;
            case "editService":
                if ($_SERVER['REQUEST_METHOD']== 'GET') {
                    $service = $this->model->getService($this->get);
                    $this->view->render("editService", $service);
                } elseif ($_SERVER['REQUEST_METHOD']== 'POST') {
                    $this->model->editService($this->post, $this->get);
                }
            break;
            case "createService":
                $this->view->render("createService");
                if ($_SERVER['REQUEST_METHOD']== 'POST') {
                    $this->model->createService($this->post);
                }
            break;
            case "allServices":
                $services =  $this->model->getServices();
                $this->view->render("allServices", $services);
            break;
            case "createBill":
                if ($_SERVER['REQUEST_METHOD']== 'GET') {
                    $clients = $this->model->getClients();
                    $services = $this->model->getServices();
                    $this->view->render("createBill", ["clients"=>$clients,'services'=>$services]);
                } elseif ($_SERVER['REQUEST_METHOD']== 'POST') {
                    $this->model->createBill($this->post);
                }
            break;
            case "downloadFile":

                $this->model->createPdf($this->get);
            break;
            default:
                $this->view->render("login");
            break;

        }
    }
}

//konto1 hasło
