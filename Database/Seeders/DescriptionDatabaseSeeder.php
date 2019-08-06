<?php

namespace Modules\Description\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DescriptionDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        \DB::table('descriptions')->truncate();

        \DB::table('descriptions')->insert([
            [
                'id' => '1',
                'mission'  => '',
                'vision'  => '',
                'core'    => ''
            ],
        ]);

        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
