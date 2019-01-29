<?php

use Illuminate\Database\Seeder;
use App\Papel;

class PapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $p1 = Papel::firstOrCreate([
            'nome'=>'geral',
            'descricao'=> 'Acesso total ao sistema'
        ]);

        $p1 = Papel::firstOrCreate([
            'nome'=>'professor',
            'descricao'=> 'Acesso parcial ao sistema'
        ]);

        $p1 = Papel::firstOrCreate([
            'nome'=>'admin',
            'descricao'=> 'Acesso total ao sistema'
        ]);
    }
}
