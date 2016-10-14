<?php
/**
 * Created by PhpStorm.
 * User: Isma
 * Date: 11/10/2016
 * Time: 16:24
 */

namespace Blog\BadgeBundle\Twig\Extension;



class DataExtension extends \Twig_Extension
{
    /**
     *
     */
    public function getFilters()
    {
        return [
            new \Twig_SimpleFilter('date_fr', [$this, 'formatFrenchDate', []])
        ];

    }

    /**
     * @param string|DateTime $date
     */
    public function formatFrenchDate($date)
    {

        if (is_string($date)) {
            $date = new  \DateTime($date);
        }

        dump($date->format('d/m/y'));

    }

}