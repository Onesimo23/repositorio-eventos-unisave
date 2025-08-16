@extends('main')

@section('title', 'Gerenciar Eventos')

@section('content')
<div class="container-fluid">
    <br>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="m-0">Gerenciar Eventos</h1>
        <button class="btn btn-primary" data-toggle="modal" data-target="#createEventoModal">Novo Evento</button>
    </div>

    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Data</th>
                <th>Hora</th>
                <th>Local</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($eventos as $evento)
            <tr>
                <td>{{ $evento->id }}</td>
                <td>{{ $evento->titulo }}</td>
                <td>{{ $evento->data }}</td>
                <td>{{ $evento->hora }}</td>
                <td>{{ $evento->local }}</td>
                <td>{{ ucfirst($evento->status) }}</td>
                <td>
                    <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editEventoModal{{ $evento->id }}">Editar</button>
                    <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteEventoModal{{ $evento->id }}">Deletar</button>
                </td>
            </tr>

            <!-- Modal Editar -->
            <div class="modal fade" id="editEventoModal{{ $evento->id }}" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <form action="{{ route('eventos.update', $evento->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Editar Evento</h5>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Título</label>
                                    <input type="text" name="titulo" class="form-control" value="{{ $evento->titulo }}" required>
                                </div>
                                <div class="form-group">
                                    <label>Descrição</label>
                                    <textarea name="descricao" class="form-control" required>{{ $evento->descricao }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Data</label>
                                    <input type="date" name="data" class="form-control" value="{{ $evento->data }}" required>
                                </div>
                                <div class="form-group">
                                    <label>Hora</label>
                                    <input type="time" name="hora" class="form-control" value="{{ $evento->hora }}" required>
                                </div>
                                <div class="form-group">
                                    <label>Local</label>
                                    <input type="text" name="local" class="form-control" value="{{ $evento->local }}" required>
                                </div>
                                <div class="form-group">
                                    <label>Organizador</label>
                                    <input type="text" name="organizador" class="form-control" value="{{ $evento->organizador }}" required>
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control">
                                        <option value="ativo" {{ $evento->status=='ativo' ? 'selected' : '' }}>Ativo</option>
                                        <option value="cancelado" {{ $evento->status=='cancelado' ? 'selected' : '' }}>Cancelado</option>
                                        <option value="finalizado" {{ $evento->status=='finalizado' ? 'selected' : '' }}>Finalizado</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Categoria</label>
                                    <select name="categoria_id" class="form-control">
                                        <option value="">Nenhuma</option>
                                        @foreach($categorias as $cat)
                                        <option value="{{ $cat->id }}" {{ $evento->categoria_id==$cat->id ? 'selected' : '' }}>{{ $cat->nome }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Imagem</label>
                                    <input type="file" name="imagem" class="form-control">
                                    @if($evento->imagem)
                                    <img src="{{ asset('storage/'.$evento->imagem) }}" alt="Imagem" class="img-fluid mt-2" style="max-height:100px;">
                                    @endif
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Salvar</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Modal Deletar -->
            <div class="modal fade" id="deleteEventoModal{{ $evento->id }}" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-sm" role="document">
                    <form action="{{ route('eventos.destroy', $evento->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-danger">Confirmar Exclusão</h5>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <p>Tem certeza que deseja deletar o evento <strong>{{ $evento->titulo }}</strong>?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-danger">Deletar</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal Criar Evento -->
<div class="modal fade" id="createEventoModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <form action="{{ route('eventos.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Novo Evento</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="modal-body">
                    <div class="form-group">
                        <label>Título</label>
                        <input type="text" name="titulo" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Descrição</label>
                        <textarea name="descricao" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Data</label>
                        <input type="date" name="data" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Hora</label>
                        <input type="time" name="hora" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Local</label>
                        <input type="text" name="local" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Organizador</label>
                        <input type="text" name="organizador" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <option value="ativo" selected>Ativo</option>
                            <option value="cancelado">Cancelado</option>
                            <option value="finalizado">Finalizado</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Categoria</label>
                        <select name="categoria_id" class="form-control">
                            <option value="">Nenhuma</option>
                            @foreach($categorias as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Imagem</label>
                        <input type="file" name="imagem" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Criar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </form>


    </div>
</div>
@endsection