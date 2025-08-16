@extends('main')

@section('title', 'Gerenciar Usuários')

@section('content')
<div class="container-fluid">
    <br>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="m-0">Gerenciar Usuários</h1>
        <button class="btn btn-primary" data-toggle="modal" data-target="#createUserModal">Novo Usuário</button>
    </div>
    <!-- Tabela de Usuários -->
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Função</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role }}</td>
                <td>
                    <!-- Botão Editar -->
                    <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editUserModal{{ $user->id }}">Editar</button>

                    <!-- Botão Deletar -->
                    <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteUserModal{{ $user->id }}">Deletar</button>
                </td>
            </tr>

            <!-- Modal Deletar -->
            <div class="modal fade" id="deleteUserModal{{ $user->id }}" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-sm" role="document">
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-danger">Confirmar Exclusão</h5>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <p>Tem certeza que deseja deletar o usuário <strong>{{ $user->name }}</strong>?</p>
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

<!-- Modal Criar Usuário -->
<div class="modal fade" id="createUserModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <form action="{{ route('users.store') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Novo Usuário</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nome</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Função</label>
                        <select name="role" class="form-control">
                            <option value="admin">Admin</option>
                            <option value="organizador">Organizador</option>
                            <option value="usuario" selected>Usuário</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Senha</label>
                        <input type="password" name="password" class="form-control" required>
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

