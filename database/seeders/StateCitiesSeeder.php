<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StateCitiesSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Setup Inicial Obrigatório

        $json = file_get_contents("http://servicodados.ibge.gov.br/api/v1/localidades/estados");
        $states = json_decode($json);

        foreach($states as $state){
            DB::table('states')->insert(['id' => $state->id, 'uf' => $state->sigla, 'name' => $state->nome]);

            $json = file_get_contents("https://servicodados.ibge.gov.br/api/v1/localidades/estados/{$state->id}/municipios");
            $cities = json_decode($json);

            foreach($cities as $city){
                DB::table('cities')->insert(['id' => $city->id, 'state_id' => $state->id, 'name' => $city->nome]);
            }
        }
    }
}
