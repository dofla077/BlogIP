<?php

namespace Blog\UserBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use FOS\UserBundle\Model\User as BaseUser;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="fos_user")
 * @ORM\Entity(repositoryClass="Blog\UserBundle\Repository\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected  $id;

    /**
     * @ORM\OneToMany(targetEntity="Blog\BadgeBundle\Entity\UserBadge", mappedBy="user")
     * @ORM\JoinColumn(nullable=false)
     */
    private $userBadges;

    public function __construct()
    {
        parent::__construct();
        $this->userBadges = new ArrayCollection;
    }


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}
