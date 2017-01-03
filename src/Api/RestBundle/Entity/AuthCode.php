<?php
/**
 * Created by PhpStorm.
 * User: Isma
 * Date: 11/12/2016
 * Time: 18:58
 */

namespace Api\RestBundle\Entity;


use FOS\OAuthServerBundle\Entity\AuthCode as BaseAuthCode;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table("oauth2_auth_codes")
 * @ORM\Entity(repositoryClass="Api\ResetBundle\Repository\AuthCodeRepository")
 */
class AuthCode extends BaseAuthCode
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="Client")
     * @ORM\JoinColumn(nullable=false)
     */
    protected $client;

    /**
     * @ORM\ManyToOne(targetEntity="Blog\UserBundle\Entity\User")
     */
    protected $user;
}