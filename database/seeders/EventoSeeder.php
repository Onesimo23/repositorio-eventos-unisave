<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Evento;

class EventoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $imagemPath = 'eventos/HmCGYXZ7UxEwxKIoQQuD2DZwbRuCKpGCkebZcsZq.jpg';

        Evento::create([
            'titulo' => 'Congresso de Tecnologia',
            'descricao' => 'Um grande evento com palestras sobre inovação, IA e futuro da tecnologia.',
            'data' => '2025-09-20',
            'hora' => '09:00',
            'local' => 'Centro de Convenções de Maputo',
            'organizador' => 'Tech Community',
            'status' => 'ativo',
            'imagem' => $imagemPath,
            'categoria_id' => null,
        ]);

        Evento::create([
            'titulo' => 'Workshop de Programação Web',
            'descricao' => 'Aprenda a criar aplicações modernas com Laravel e Vue.js.',
            'data' => '2025-10-05',
            'hora' => '14:00',
            'local' => 'Faculdade de Engenharia',
            'organizador' => 'Gaza Code',
            'status' => 'ativo',
            'imagem' => $imagemPath,
            'categoria_id' => null,
        ]);

        Evento::create([
            'titulo' => 'Feira de Startups',
            'descricao' => 'Empreendedores apresentam suas startups e buscam investidores.',
            'data' => '2025-11-12',
            'hora' => '10:00',
            'local' => 'Parque de Inovação',
            'organizador' => 'Startup Hub',
            'status' => 'ativo',
            'imagem' => $imagemPath,
            'categoria_id' => null,
        ]);
    }
}
