<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 2/10/2020
 * Time: 2:59 PM
 */

namespace App\Helper;


class QualityStatus
{
    const Open = 0;
    const PendingProduction = 1;
    const Closed = 2;
    const arr = [
        '0' => 'Open',
        '1' => 'Pending Production',
        '2' => 'Closed',
    ];

    static function getStatus($status)
    {
        $arr = array(
            '0' => 'Open',
            '1' => 'Pending Production',
            '2' => 'Closed',
        );
        return $arr[$status];
    }
}
