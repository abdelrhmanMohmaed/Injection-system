<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 12/8/2019
 * Time: 12:54 PM
 */

namespace App\Helper;


class RequestImportance
{
    const Normal = 0;
    const Mid = 1;
    const High = 2;
    const arr = [
        '0' => 'Normal',
        '1' => 'Mid',
        '2' => 'High',
    ];

    static function getImportance($status)
    {
        $arr = array(
            '0' => 'Normal',
            '1' => 'Mid',
            '2' => 'High',
        );
        return $arr[$status];
    }

}
