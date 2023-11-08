<?php

use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $permissions=[
           'view users',
           'edit users',
           'add users',
           'delete users',
           'add role',
           'edit role',
           'delete role',
           'view role',
           'add partNumber',
           'edit partNumber',
           'view partNumber',
           'delete partNumber',
           'add machine',
           'edit machine',
           'view machine',
           'delete machine',
       ];
//       foreach ($permissions as $p){
//           \Spatie\Permission\Models\Permission::create(['name'=>$p]);
//       }
//       $admin=\Spatie\Permission\Models\Role::create(['name'=>'Admin']);

       \Spatie\Permission\Models\Role::findById(1)->syncPermissions(\Spatie\Permission\Models\Permission::get());
    }
}
