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

        $perfil1 = Permission::firstOrCreate([
            'name' =>'perfil-view',
            'description' =>'Acesso ao perfil'
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
    }
}
