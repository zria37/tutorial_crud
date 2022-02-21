<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->insert([
            'name'  => 'Zakharia',
            'Jk'    => 'Laki-Laki',
            'notlp' => '081220684145'   
        ]);
    }
}
