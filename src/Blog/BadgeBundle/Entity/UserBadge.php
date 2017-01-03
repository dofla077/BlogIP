<?php

namespace Blog\BadgeBundle\Entity;

use Blog\BadgeBundle\Entity\Badge;
use Blog\UserBundle\Entity\User;
use Doctrine\ORM\Mapping as ORM;

/**
 * userBadge
 *
 * @ORM\Table(name="user_badge")
 * @ORM\Entity(repositoryClass="Blog\BadgeBundle\Repository\userBadgeRepository")
 */
class UserBadge
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
     * @var \DateTime
     *
     * @ORM\Column(name="optentionedAt", type="datetime")
     */
    private $optentionedAt;


    /**
     * @ORM\ManyToOne(targetEntity="Blog\BadgeBundle\Entity\Badge", inversedBy="userBadges")
     * @ORM\JoinColumn(nullable=false)
     */
    private $badge;

    /**
     * @ORM\ManyToOne(targetEntity="Blog\UserBundle\Entity\User", inversedBy="userBadges")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;


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
     * Set optentionedAt
     *
     * @param \DateTime $optentionedAt
     * @return UserBadge
     */
    public function setOptentionedAt($optentionedAt)
    {
        $this->optentionedAt = $optentionedAt;

        return $this;
    }

    /**
     * Get optentionedAt
     *
     * @return \DateTime 
     */
    public function getOptentionedAt()
    {
        return $this->optentionedAt;
    }

    /**
     * Set user
     *
     * @param User|User $user
     * @return UserBadge
     */
    public function setUser(User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Blog\BadgeBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set badge
     *
     * @param Badge $badge
     * @return UserBadge
     */
    public function setBadge(Badge $badge)
    {
        $this->badge = $badge;

        return $this;
    }

    /**
     * Get badge
     *
     * @return Badge
     */
    public function getBadge()
    {
        return $this->badge;
    }
}
