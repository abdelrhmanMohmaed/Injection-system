<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 2/10/2020
 * Time: 3:36 PM
 */

namespace App\Helper;


class IssueType
{
    const Tooling = 0;
    const Quality = 1;
    const Maintenance = 2;


    const arr = [
        '0' => 'Tooling',
        '1' => 'Quality',
        '2' => 'Maintenance',
    ];

    static function getType($status)
    {
        $arr = array(
            '0' => 'Tooling',
            '1' => 'Quality',
            '2' => 'Maintenance',
        );
        return $arr[$status];
    }
}
