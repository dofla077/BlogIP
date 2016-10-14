<?php

namespace Blog\BadgeBundle\Controller;

use Blog\BadgeBundle\EventDispatcher\Event\FooEvent;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        /*$checker = $this->get('blog_badge.checker');

        return $this->render('BlogBadgeBundle:Default:index.html.twig', [
            'checker' => $checker
        ]);*/
    }

    public function fooAction()
    {
        /*$resource = ['id' => 77];

        $event = (new FooEvent)->setRessource($resource);

        $this
            ->container
            ->get('event_dispatcher')
            ->dispatch('view.access', $event);*/

        return $this->render('BlogBadgeBundle:Default:foo.html.twig');
    }
}
