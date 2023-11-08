<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 12/8/2019
 * Time: 12:54 PM
 */

namespace App\Helper;


class MainActionType
{
    const Solved = 0;
    const ExternalSparePart = 1;
    const Agent = 2;
    const ProcessIssue = 3;
    const DownloadTool = 4;
    const ToolShopIssue = 5;

    const arr = [
        '0' => 'Solved',
        '1' => 'External SparePart',
        '2' => 'Agent',
        '3' => 'Process Issue',
        '4' => 'Download Tool',
        '5' => 'ToolShop Issue',
    ];

    static function getType($status)
    {
        $arr = array(
            '0' => 'Solved',
            '1' => 'External SparePart',
            '2' => 'Agent',
            '3' => 'Process Issue',
            '4' => 'Download Tool',
            '5' => 'ToolShop Issue',
        );
        return $arr[$status];
    }
}
