<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 12/8/2019
 * Time: 12:54 PM
 */

namespace App\Helper;


class RequestPriority
{
    const Production = 0;
    const EOK = 1;

    static function getPriority($status)
    {
        $arr = array(
            '0' => 'Production',
            '1' => 'EOK',
        );
        return $arr[$status];
    }

    const arr = [
        '0' => 'Production',
        '1' => 'EOK',
    ];
}
