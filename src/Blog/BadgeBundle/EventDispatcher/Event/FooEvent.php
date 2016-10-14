<?php
/**
 * Created by PhpStorm.
 * User: Isma
 * Date: 11/10/2016
 * Time: 11:35
 */

namespace Blog\BadgeBundle\EventDispatcher\Event;


use Symfony\Component\EventDispatcher\Event;

class FooEvent extends Event
{
    /**
     * @var mixed
     */
    protected $ressource;

    /**
     * @return mixed
     */
    public function getRessource()
    {
        return $this->ressource;
    }

    /**
     * @param mixed $ressource
     * @return $this
     */
    public function setRessource($ressource)
    {
        $this->ressource = $ressource;
        return $this;
    }

}