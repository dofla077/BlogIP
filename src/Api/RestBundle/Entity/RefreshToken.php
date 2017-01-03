<?php
/**
 * Created by PhpStorm.
 * User: Isma
 * Date: 11/12/2016
 * Time: 18:56
 */

namespace Api\RestBundle\Entity;


use FOS\OAuthServerBundle\Entity\RefreshToken as BaseRefreshToken;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table("oauth2_refresh_tokens")
 * @ORM\Entity(repositoryClass="Api\RestBundle\Repository\RefreshTokenRepository")
 */
class RefreshToken extends BaseRefreshToken
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