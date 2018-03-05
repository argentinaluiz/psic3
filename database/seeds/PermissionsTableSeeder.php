<?php

use Illuminate\Database\Seeder;
use App\Models\Painel\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users1 = Permission::firstOrCreate([
            'name' =>'users-view',
            'description' =>'Acesso a lista de Usuários'
        ]);
        $users2 = Permission::firstOrCreate([
            'name' =>'users-create',
            'description' =>'Adicionar Usuários'
        ]);
        $users3 = Permission::firstOrCreate([
            'name' =>'users-edit',
            'description' =>'Editar Usuários'
        ]);
        $users4 = Permission::firstOrCreate([
            'name' =>'users-delete',
            'description' =>'Deletar Usuários'
        ]);
  
        $roles1 = Permission::firstOrCreate([
            'name' =>'role-view',
            'description' =>'Listar Papéis'
        ]);
        $roles2 = Permission::firstOrCreate([
            'name' =>'role-create',
            'description' =>'Adicionar Papéis'
        ]);
        $roles3 = Permission::firstOrCreate([
            'name' =>'role-edit',
            'description' =>'Editar Papéis'
        ]);
  
        $roles4 = Permission::firstOrCreate([
            'name' =>'role-delete',
            'description' =>'Deletar Papéis'
        ]);

        $favorites1 = Permission::firstOrCreate([
            'name' =>'favorites-view',
            'description' =>'Acesso aos favoritos'
        ]);

        $favorites2 = Permission::firstOrCreate([
            'name' =>'favorites-create',
            'description' =>'Adicionar favoritos'
        ]);
  
        $favorites3 = Permission::firstOrCreate([
            'name' =>'favorites-delete',
            'description' =>'Deletar favoritos'
        ]);

        $perfil1 = Permission::firstOrCreate([
            'name' =>'perfil-view',
            'description' =>'Acesso ao perfil'
        ]);

        $perfil2 = Permission::firstOrCreate([
            'name' =>'perfil-edit',
            'description' =>'Atualizar perfil'
        ]);

        $products1 = Permission::firstOrCreate([
            'name' =>'products-view',
            'description' =>'Listar produtos'
        ]);

        $products2 = Permission::firstOrCreate([
            'name' =>'products-create',
            'description' =>'Adicionar produtos'
        ]);

        $products3 = Permission::firstOrCreate([
            'name' =>'products-edit',
            'description' =>'Editar produtos'
        ]);

        $products4 = Permission::firstOrCreate([
            'name' =>'products-delete',
            'description' =>'Deletar produtos'
        ]);
  
        $permission1 = Permission::firstOrCreate([
            'name' =>'permission-view',
            'description' =>'Acesso ao perfil'
        ]);
  
        $calls1 = Permission::firstOrCreate([
            'name' =>'calls-view',
            'description' =>'Acesso aos chamados'
        ]);
  
        $calls2 = Permission::firstOrCreate([
            'name' =>'calls-create',
            'description' =>'Acesso aos chamados'
        ]);
        $calls3 = Permission::firstOrCreate([
            'name' =>'calls-edit',
            'description' =>'Acesso aos chamados'
        ]);
        $calls4 = Permission::firstOrCreate([
            'name' =>'calls-delete',
            'description' =>'Acesso aos chamados'
        ]);
        
        $clients1 = Permission::firstOrCreate([
            'name' =>'clients-view',
            'description' =>'Acesso a lista de Clientes'
        ]);
        $clients2 = Permission::firstOrCreate([
            'name' =>'clients-create',
            'description' =>'Adicionar Clientes'
        ]);
        $clients3 = Permission::firstOrCreate([
            'name' =>'clients-edit',
            'description' =>'Editar Clientes'
        ]);
        $clients4 = Permission::firstOrCreate([
            'name' =>'clients-delete',
            'description' =>'Deletar Clientes'
        ]);

        $imagens1 = Permission::firstOrCreate([
            'name' =>'imagens-view',
            'description' =>'Acesso a lista de Imagens'
        ]);
        $imagens2 = Permission::firstOrCreate([
            'name' =>'imagens-create',
            'description' =>'Adicionar Imagens'
        ]);
        $imagens3 = Permission::firstOrCreate([
            'name' =>'imagens-edit',
            'description' =>'Editar Imagens'
        ]);
        $imagens4 = Permission::firstOrCreate([
            'name' =>'imagens-delete',
            'description' =>'Deletar Imagens'
        ]);

        $researches1 = Permission::firstOrCreate([
            'name' =>'researches-view',
            'description' =>'Acesso a lista de Pesquisas'
        ]);
        $researches2 = Permission::firstOrCreate([
            'name' =>'researches-create',
            'description' =>'Adicionar Pesquisa'
        ]);
        $researches3 = Permission::firstOrCreate([
            'name' =>'researches-edit',
            'description' =>'Editar Pesquisa'
        ]);
        $researches4 = Permission::firstOrCreate([
            'name' =>'researches-delete',
            'description' =>'Deletar Pesquisas'
        ]);

        $slides1 = Permission::firstOrCreate([
            'name' =>'slides-view',
            'description' =>'Acesso a lista de Slides'
        ]);
        $slides2 = Permission::firstOrCreate([
            'name' =>'slides-create',
            'description' =>'Adicionar Slide'
        ]);
        $slides3 = Permission::firstOrCreate([
            'name' =>'slides-edit',
            'description' =>'Editar Slide'
        ]);
        $slides4 = Permission::firstOrCreate([
            'name' =>'slides-delete',
            'description' =>'Deletar Slide'
        ]);

        $documents1 = Permission::firstOrCreate([
            'name' =>'documents-view',
            'description' =>'Acesso a lista de Documentos'
        ]);
        $documents2 = Permission::firstOrCreate([
            'name' =>'documents-create',
            'description' =>'Adicionar Documento'
        ]);
        $documents3 = Permission::firstOrCreate([
            'name' =>'documents-edit',
            'description' =>'Editar Documento'
        ]);
        $documents4 = Permission::firstOrCreate([
            'name' =>'documents-delete',
            'description' =>'Deletar Documento'
        ]);

         $categories1 = Permission::firstOrCreate([
            'name' =>'categories-view',
            'description' =>'Acesso a lista de Documentos'
        ]);
        $categories2 = Permission::firstOrCreate([
            'name' =>'categories-create',
            'description' =>'Adicionar Documento'
        ]);
        $categories3 = Permission::firstOrCreate([
            'name' =>'categories-edit',
            'description' =>'Editar Documento'
        ]);
        $categories4 = Permission::firstOrCreate([
            'name' =>'categories-delete',
            'description' =>'Deletar Documento'
        ]);


    }
}
