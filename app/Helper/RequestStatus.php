<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 12/8/2019
 * Time: 12:54 PM
 */

namespace App\Helper;


class RequestStatus
{
    const Open = 0;
    const InToolShop = 1;
    const CloseFromTool = 2;
    const Closed = 3;
    const NeedToolShop = 4;
    const RejectFromProduction = 5;

    const arr = [
        '0' => 'Open',
        '1' => 'InToolShop',
        '2' => 'CloseFromTool',
        '3' => 'Closed',
        '4' => 'NeedToolShop',
        '5' => 'RejectFromProduction',
    ];

    static function getStatus($status)
    {
        $arr = array(
            '0' => 'Open',
            '1' => 'InToolShop',
            '2' => 'CloseFromTool',
            '3' => 'Closed',
            '4' => 'NeedToolShop',
            '5' => 'RejectFromProduction',
        );
        return $arr[$status];
    }
}
