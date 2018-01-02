<?php

use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Painel\Client::class,5)->states(\App\Models\Painel\Client::TYPE_INDIVIDUAL)->create();
        factory(\App\Models\Painel\Client::class,5)->states(\App\Models\Painel\Client::TYPE_LEGAL)->create();
    }
}
