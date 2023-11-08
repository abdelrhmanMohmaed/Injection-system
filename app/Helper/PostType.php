<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 1/27/2020
 * Time: 8:20 AM
 */

namespace App\Helper;


class PostType
{
    const Continue = 0;
    const ChangeOver = 1;


    const arr = [
        '0' => 'Continue',
        '1' => 'ChangeOver',
    ];

    static function getType($status)
    {
        $arr = array(
            '0' => 'Continue',
            '1' => 'ChangeOver',
        );
        return $arr[$status];
    }
}
