<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 2/10/2020
 * Time: 2:59 PM
 */

namespace App\Helper;


class MainStatus
{
    const Open = 0;
    const ToolShopIssue = 1;
    const ProcessIssue = 2;
    const NeedToolDownload = 3;
    const ToolDownloaded = 4;
    const RejectFromProduction = 5;
    const Closed = 6;
    const ClosedFromMain = 7;
    const arr = [
        '0' => 'Open',
        '1' => 'ToolShop Issue',
        '2' => 'Process Issue',
        '3' => 'NeedTool Download',
        '4' => 'Tool Downloaded',
        '5' => 'Reject From Production',
        '6' => 'Closed',
        '7' => 'Closed From Maintenance',
    ];

    static function getStatus($status)
    {
        $arr = array(
            '0' => 'Open',
            '1' => 'ToolShop Issue',
            '2' => 'Process Issue',
            '3' => 'NeedTool Download',
            '4' => 'Tool Downloaded',
            '5' => 'Reject From Production',
            '6' => 'Closed',
            '7' => 'Closed From Maintenance',
        );
        return $arr[$status];
    }
}
