<?php
/**
 * Created by PhpStorm.
 * User: Isma
 * Date: 10/10/2016
 * Time: 12:07
 */

namespace Blog\BadgeBundle\Services;


use Monolog\Logger;

class Checker
{
    /**
     * @var Logger
     */
    protected  $logger;

    /**
     * @param mixed $logger
     * @return $this
     */
    public function setLogger(Logger $logger)
    {
        $this->logger = $logger;
        return $this;
    }

    /**
     * @return bool
     */
    public function check()
    {
        $this->logger->info('Je fais quelque chose');

        return true;
    }

}