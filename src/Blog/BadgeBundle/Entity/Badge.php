<?php

namespace Blog\BadgeBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Badge
 *
 * @ORM\Table(name="badge")
 * @ORM\Entity(repositoryClass="Blog\BadgeBundle\Repository\BadgeRepository")
 */
class Badge
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;


    /**
     * @ORM\OneToMany(targetEntity="Blog\BadgeBundle\Entity\UserBadge", mappedBy="badge")
     * @ORM\JoinColumn(nullable=false)
     */
    private $userBadges;

    public function __construct() {
        $this->userBadges = new ArrayCollection();
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

    /**
     * Set name
     *
     * @param string $name
     * @return Badge
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Badge
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Badge
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Add users
     *
     * @param \Blog\BadgeBundle\Entity\User $users
     * @return Badge
     */
    public function addUser(\Blog\BadgeBundle\Entity\User $users)
    {
        $this->users[] = $users;

        return $this;
    }

    /**
     * Remove users
     *
     * @param \Blog\BadgeBundle\Entity\User $users
     */
    public function removeUser(\Blog\BadgeBundle\Entity\User $users)
    {
        $this->users->removeElement($users);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * Add userBadges
     *
     * @param \Blog\BadgeBundle\Entity\UserBadge $userBadges
     * @return Badge
     */
    public function addUserBadge(\Blog\BadgeBundle\Entity\UserBadge $userBadges)
    {
        $this->userBadges[] = $userBadges;

        return $this;
    }

    /**
     * Remove userBadges
     *
     * @param \Blog\BadgeBundle\Entity\UserBadge $userBadges
     */
    public function removeUserBadge(\Blog\BadgeBundle\Entity\UserBadge $userBadges)
    {
        $this->userBadges->removeElement($userBadges);
    }

    /**
     * Get userBadges
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUserBadges()
    {
        return $this->userBadges;
    }
}
