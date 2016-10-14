<?php
/**
 * Created by PhpStorm.
 * User: Isma
 * Date: 11/10/2016
 * Time: 09:40
 */

namespace Blog\BadgeBundle\EventDispatcher\Listener;

use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\Event;

class ViewListener
{
    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * @param mixed $logger
     * @return $this
     */
    public function setLogger(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @param FooEvent|Event $event
     * @return bool
     */
    public function onKernelView(Event $event)
    {
        dump($event);
        $this->logger->info('Je fais quelque chose que pour la vue quoi !!');

    }

}