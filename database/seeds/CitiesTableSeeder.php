<?php

use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(\App\Models\Painel\State::$states as $st){
            $state = new \App\Models\Painel\State();
            $state->name = $st;
            $state->initials = $st;
            $state->save();
            
        foreach(range(1,20) as $v){
            $city = new \App\Models\Painel\City();
            $city->name = rand(1,10000);
            $city->zip_code = rand(10000,1000000);
            $city->state_id = $state->id;
            $city->save();
          }
        }
    }
}
