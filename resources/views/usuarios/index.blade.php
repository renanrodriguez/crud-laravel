@extends('layout')

@section('title', 'Usuários')

@section('cabecalho')
<h2 class="text-secondary">Listar usuários</h2>
@endsection

@section('conteudo')

<a href="/usuarios/adicionar" class="btn btn-primary float-right m-2">Adicionar usuário</a>

<table class="table text-center">
    <thead>
        <tr class="text-center">
            <th scope="col">Nome</th>
            <th scope="col">Email</th>
            <th scope="col">Data de Nascimento</th>
            <th scope="col">Data de Criação</th>
            <th scope="col">Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($usuarios as $key => $usuario){ ?>
        <tr data-id=<?= $usuario->id?>>
            <td><?=$usuario->nome?> </td>
            <td><?=$usuario->email?> </td>
            <td><?= date("d/m/Y", strtotime($usuario->data_nascimento)) ?></td>
            <td><?= date("d/m/Y - h:i:s", strtotime($usuario->data_criacao)) ?></td>

            <td class="btn-group">
                <form method="GET" action="/usuarios/editar/{{$usuario->id}}" name="formSelecionarEditarUsuario" data-id={{$usuario->id}}>
                    @csrf
                    <input type="hidden" name="id" value={{$usuario->id}}></input>
                    <button type="submit" class="btn btn-info">Editar</button>
                </form>
                <form method="POST" action="/usuarios/remover/{{$usuario->id}}" name="formExcluirUsuario" data-id={{$usuario->id}}>
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="id" value={{$usuario->id}}></input>
                    <button type="submit" class="btn btn-danger">Excluir</button>
                </form>
            </td>
            </th>
        </tr>
        <?php } ?>
    </tbody>
</table>
</div>
@endsection