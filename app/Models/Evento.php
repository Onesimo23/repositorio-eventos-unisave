<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $fillable = [
        'titulo',
        'descricao',
        'data',
        'hora',
        'local',
        'organizador',
        'status',
        'imagem',
        'categoria_id',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function inscricoes()
    {
        return $this->hasMany(Inscricao::class);
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }
}
