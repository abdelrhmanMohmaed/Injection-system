<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 2/16/2020
 * Time: 11:53 AM
 */

namespace App\Helper;


class RequestType
{
    const Quality = 0;
    const Maintenance = 1;


    const arr = [
        '0' => 'Quality',
        '1' => 'Maintenance',
    ];

    static function getType($status)
    {
        $arr = array(
            '0' => 'Quality',
            '1' => 'Maintenance',
        );
        return $arr[$status];
    }
}
