<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DynamicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        /* Reparação */
        DB::table('dynamics')->insert([
            'model' => 'Reparacao',
            'nome' => 'Oleo',
            
        ]);

        /* Veiculo */
        DB::table('dynamics')->insert([
            'model' => 'Veiculo',
            'nome' => 'Kms',
            
        ]);
    }
}
