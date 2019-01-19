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
            'nome'=>'Geral',
            'descricao'=> 'Acesso total ao sistema'
        ]);

        $p1 = Papel::firstOrCreate([
            'nome'=>'Professor',
            'descricao'=> 'Acesso total ao sistema'
        ]);

        $p1 = Papel::firstOrCreate([
            'nome'=>'Administrativo',
            'descricao'=> 'Acesso total ao sistema'
        ]);
    }
}
