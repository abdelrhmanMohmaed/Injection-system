<?php

use Illuminate\Database\Seeder;

class SeelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $data = [
            [
                'name'=>'SEEL 1',
            ],
            [
                'name'=>'SEEL 2',
            ],
            [
                'name'=>'SEEL 3',
            ],
            [
                'name'=>'SEEL 4',
            ],
            [
                'name'=>'SEEL 5',
            ],

            ];

        \App\Models\Seel::insert($data);
    }
}
