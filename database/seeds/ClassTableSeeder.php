<?php

use Illuminate\Database\Seeder;

class ClassTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['degree' => 'I'],
            ['degree' => 'II'],
            ['degree' => 'III'],
            ['degree' => 'IV'],
            ['degree' => 'V'],
            ['degree' => 'VI']
        ];
        DB::table('class')->insert($data);
    }
}
