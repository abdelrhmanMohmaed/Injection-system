<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 11/25/2019
 * Time: 8:36 AM
 */
/*
$all=\Config::get('database.connections');
foreach ($all as $item) {
    $colname = 'Tables_in_' . $item['database'];
    $tables = \Illuminate\Support\Facades\DB::select('SHOW TABLES');
    foreach ($tables as $table) {
        dump($table);
        $droplist[] = $table->$colname;
    }
    $droplist = implode(',', $droplist);
    \Illuminate\Support\Facades\DB::beginTransaction();
    \Illuminate\Support\Facades\DB::statement('SET FOREIGN_KEY_CHECKS = 0');
    \Illuminate\Support\Facades\DB::statement("DROP TABLE $droplist");
    \Illuminate\Support\Facades\DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    \Illuminate\Support\Facades\DB::commit();
}
*/
