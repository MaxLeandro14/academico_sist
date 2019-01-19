<?php

use Illuminate\Database\Seeder;
use App\Permissao;

class PermissaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuarios1 = Permissao::firstOrCreate([
            'nome'=>'usuario-view',
            'descricao'=>'Acesso a lista de Usuários'
        ]);
        $usuarios2 = Permissao::firstOrCreate([
            'nome'=>'usuario-create',
            'descricao'=>'Adicionar Usuários'
        ]);
        $usuarios3 = Permissao::firstOrCreate([
            'nome'=>'usuario-edit',
            'descricao'=>'Editar Usuários'
        ]);
        $usuarios4 = Permissao::firstOrCreate([
            'nome'=>'usuario-desligar',
            'descricao'=>'Desligar Usuários'
        ]);
        $papeis1 = Permissao::firstOrCreate([
            'nome'=>'papel-view',
            'descricao'=>'Listar Papéis'
        ]);
        $papeis2 = Permissao::firstOrCreate([
            'nome'=>'papel-create',
            'descricao'=>'Listar Papéis'
        ]);
        $papeis3 = Permissao::firstOrCreate([
            'nome'=>'papel-edit',
            'descricao'=>'Editar Papéis'
        ]);
        $papeis4 = Permissao::firstOrCreate([
            'nome'=>'papel-delete',
            'descricao'=>'Remover Papéis'
        ]);
    }
}
