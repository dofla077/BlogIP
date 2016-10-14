<?php
/**
 * Created by PhpStorm.
 * User: Isma
 * Date: 10/10/2016
 * Time: 17:40
 */

namespace Blog\BadgeBundle\EventDispatcher\Listener;


use Symfony\Component\HttpKernel\Event\FilterControllerEvent;
use Twig_Environment;

class ControllerListener
{
    /**
     * @var Twig_Environment $twig
     */
    protected $twig;

    public function onKernelController(FilterControllerEvent $event)
    {
        list($controller, $action) = $event->getController();

        $this->twig->addGlobal('controller', $controller);
    }

    /**
     * @param Twig_Environment $twig
     */
    public function setTwig($twig)
    {
        $this->twig = $twig;
    }

}