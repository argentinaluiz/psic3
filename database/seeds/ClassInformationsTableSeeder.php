<?php

use Illuminate\Database\Seeder;

class ClassInformationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $patients = \App\Models\Painel\Patient::all();
        factory(\App\Models\Painel\ClassInformation::class,50)
            ->create()
            ->each(function (\App\Models\Painel\ClassInformation $model) use ($patients){
                /** @var Illuminate\Support\Collection $patients */
                $patientsCol = $patients->random(10);
                $model->patients()->attach($patientsCol->pluck('id'));
        });
    }
}
