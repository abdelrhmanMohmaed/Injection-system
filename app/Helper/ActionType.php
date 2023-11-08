<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 12/8/2019
 * Time: 12:54 PM
 */

namespace App\Helper;


class ActionType
{
    const SolvedOnM = 0;
    const NeedToolShop = 1;
    const SolvedWithCloseCavity = 2;
    const Solved = 3;
    const Transfer = 4;

    const arr = [
        '0' => 'Solved On Machine',
        '1' => 'Need ToolShop',
        '2' => 'Solved With Close Cavity',
        '3' => 'Solved',
        '4' => 'Transfer',
    ];

    static function getType($status)
    {
        $arr = array(
            '0' => 'Solved On Machine',
            '1' => 'Need ToolShop',
            '2' => 'Solved With Close Cavity',
            '3' => 'Solved',
            '4' => 'Transfer',
        );
        return $arr[$status];
    }
}
