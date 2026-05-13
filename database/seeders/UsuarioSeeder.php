<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    \DB::table('usuarios')->insert([
        ['nome' => 'Administrador', 'login' => 'admin', 'senha' => '123'],
        ['nome' => 'Atendente', 'login' => 'atendente', 'senha' => 'qwer'],
    ]);
}
}
