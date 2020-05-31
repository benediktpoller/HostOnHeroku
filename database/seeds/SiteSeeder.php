<?php

use Illuminate\Database\Seeder;

class SiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sites')->insert([
            'label' => 'AVL',
            'url' => 'https://www.avl.com'
        ]);

        DB::table('sites')->insert([
            'label' => 'ASFINAG',
            'url' => 'https://asfinag.at'
        ]);
    }
}
