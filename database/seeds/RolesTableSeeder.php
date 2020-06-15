<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = ['Administrator', 'Manager', 'Project Manager', 'Accountant', 'Client', 'Supplier', 'Engineer', 'Machine', 'Labour', 'Helper'];
        $slugs = ['administrator', 'manager', 'project_manager', 'accountant', 'client', 'supplier', 'engineer', 'machine', 'labour', 'helper'];

        foreach ($names as $index => $name) {
            DB::table('bsoft_roles')->insert([
                'role_name'     => $name,
                'role_slug'     => $slugs[$index]
            ]);
        }
    }
}
