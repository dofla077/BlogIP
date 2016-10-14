<?php
/**
 * Created by PhpStorm.
 * User: Isma
 * Date: 14/09/2016
 * Time: 16:18
 */

namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{

    public function indexAction()
    {
        return $this->render('AppBundle::index.html.twig');
    }

    public function cguAction()
    {
        return $this->render('AppBundle::cgu.html.twig');
    }

    public function faqAction()
    {
        return $this->render('AppBundle::faq.html.twig');
    }
}