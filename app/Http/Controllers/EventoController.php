<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Categoria;
use Illuminate\Http\Request;

class EventoController extends Controller
{

    public function home()
    {
        // Evento principal (último ativo pela data)
        $eventoDestaque = \App\Models\Evento::where('status', 'ativo')
            ->orderBy('data', 'desc')
            ->first();

        // 2 próximos eventos
        $eventosSecundarios = \App\Models\Evento::where('status', 'ativo')
            ->where('id', '!=', optional($eventoDestaque)->id)
            ->orderBy('data', 'asc')
            ->take(2)
            ->get();

        // Próximos eventos para a seção "Próximos Eventos" (limito a 6 só para caber no layout)
        $eventosProximos = \App\Models\Evento::where('status', 'ativo')
            ->orderBy('data', 'asc')
            ->take(6)
            ->get();

        return view('index', compact('eventoDestaque', 'eventosSecundarios', 'eventosProximos'));
    }

    public function show(Evento $evento)
    {
        return view('eventos.show', compact('evento'));
    }

    public function index()
    {
        $eventos = Evento::all();
        $categorias = Categoria::all();
        return view('eventos.index', compact('eventos', 'categorias'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'required|string',
            'data' => 'required|date',
            'hora' => 'required',
            'local' => 'required|string|max:255',
            'organizador' => 'required|string|max:255',
            'status' => 'required|in:ativo,cancelado,finalizado',
            'imagem' => 'nullable|image|max:5120',
            'categoria_id' => 'nullable|exists:categorias,id',
        ]);

        if ($request->hasFile('imagem')) {
            $data['imagem'] = $request->file('imagem')->store('eventos', 'public');
        }

        Evento::create($data);

        return redirect()->back()->with('success', 'Evento criado com sucesso!');
    }

    public function update(Request $request, Evento $evento)
    {
        $data = $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'required|string',
            'data' => 'required|date',
            'hora' => 'required',
            'local' => 'required|string|max:255',
            'organizador' => 'required|string|max:255',
            'status' => 'required|in:ativo,cancelado,finalizado',
            'imagem' => 'nullable|image|max:5120',
            'categoria_id' => 'nullable|exists:categorias,id',
        ]);

        if ($request->hasFile('imagem')) {
            $data['imagem'] = $request->file('imagem')->store('eventos', 'public');
        }

        $evento->update($data);

        return redirect()->back()->with('success', 'Evento atualizado com sucesso!');
    }

    public function destroy(Evento $evento)
    {
        $evento->delete();
        return redirect()->back()->with('success', 'Evento deletado com sucesso!');
    }
}
