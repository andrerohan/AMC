<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        Model::unguard();

           $this->call('DynamicSeeder');
        
        Model::reguard();
        
        
        /*
        // Populate roles
        factory(App\Cliente::class, 10)->create();

        // Populate users
        factory(App\User::class, 15)->create();

        // Get all the roles attaching up to 3 random roles to each user
        $Users = App\User::all();
        
        foreach($Users as $user){
            $user->clientes()->attach(rand(1, 3));
        }

        factory(App\Dynamic::class, 5)->create();

        factory(App\Veiculo::class, 20)->create()->each(function ($veiculo) {
        
            $dynamic = App\Dynamic::where('model', 'Veiculo')->get();
            foreach($dynamic as $d){
                \App\Veiculo_Details::create([
                    'veiculo_id' => $veiculo->id,
                    'dynamic_id' => $d->id
                ]);
            }
                
        });

        factory(App\Reparacao::class, 20)->create();

        factory(App\Reparacao::class, 20)->create()->each(function ($reparacao) {
        
            $dynamic = App\Dynamic::where('model', 'Reparacao')->get();
            foreach($dynamic as $d){
                \App\Reparacao_Details::create([
                    'reparacao_id' => $reparacao->id,
                    'dynamic_id' => $d->id
                ]);
            }
                
        });
        */
    }
}
