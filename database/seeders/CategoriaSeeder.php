<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorias = [
            [
                'nome' => 'Palestras',
                'descricao' => 'Apresentações sobre temas específicos conduzidas por especialistas',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Workshops',
                'descricao' => 'Atividades práticas e interativas em grupo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Seminários',
                'descricao' => 'Encontros para discussão e aprendizado sobre temas específicos',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Conferências',
                'descricao' => 'Eventos de maior porte com múltiplas apresentações e painéis',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Mesa Redonda',
                'descricao' => 'Debates e discussões entre especialistas sobre temas específicos',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('categorias')->insert($categorias);
    }
}