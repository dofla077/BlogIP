<?php

namespace Api\RestBundle\Controller;


use FOS\RestBundle\Controller\FOSRestController;

class RestController extends FOSRestController
{
    public function getDemosAction()
    {
        $data = array("hello" => "dressrosa ");
        $view = $this->view($data);
        return $this->handleView($view);
    }
}
