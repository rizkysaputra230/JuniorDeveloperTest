<?php

use Illuminate\Database\Seeder;

class FormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('form')->insert([
        	'first_name' => 'Joni',
        	'last_name' => 'Iskandar',
        	'username' => 'kopidangdut100',
            'gender' => 'male',
            'birth' => '01/06/1997'
        ]);
    }
}
